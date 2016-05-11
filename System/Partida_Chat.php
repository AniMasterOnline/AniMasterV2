<?php
    $function = $_POST['function'];
    $file = 'Logs/'.$_POST['file'];
    $log = array();
    
    switch($function) {
        case('load'):
            if (file_exists($file)) {
                $lines = file($file);
                $text= array();
                foreach ($lines as $line_num => $line) {
                    $text[] =  $line = str_replace("\n", "", $line);
                }
                $log['text'] = $text; 
            }else{
                fwrite(fopen($file, 'a'), "<div class='chatbox pull-left f-11 text-center system'><span>¡Inicio de la sesion de roleo!</span></div>\n"); 
            }
            break;
        
        case('getState'):
            if (file_exists($file)) {
                $lines = file($file);
            }
            $log['state'] = count($lines); 
            break;  
      
        case('update'):
           $state = $_POST['state'];
           if (file_exists($file)) {
              $lines = file($file);
           }
           $count =  count($lines);
           if ($state == $count){
              $log['state'] = $state;
              $log['text'] = false;
           } else {
              $text= array();
              $log['state'] = $state + count($lines) - $state;
              foreach ($lines as $line_num => $line) {
                  if ($line_num >= $state){
                        $text[] =  $line = str_replace("\n", "", $line);
                  }
              }
              $log['text'] = $text; 
           }

           break;
       
        case('send'):
            $nickname = htmlentities(strip_tags($_POST['nickname']));
            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            $message = htmlentities(strip_tags($_POST['message']));
            if (($message) != "\n") {
                if (preg_match($reg_exUrl, $message, $url)) {
                   $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
                } 
                $color = $_POST['color'];
                fwrite(fopen($file, 'a'), "<div class='chatbox pull-left'> <div class='chatnick'><code class='".$color."'><span class='nick'>". $nickname . 
                        "</span><span class='time' >".date('h:i:s')."</span></code></div><div class='chatmsg'>" . $message = str_replace("\n", " ", $message). 
                        "</div></div><div class='clearfix'></div> \n"); 
            }
            break;
    }
    echo json_encode($log);
?>

