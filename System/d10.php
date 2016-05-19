<?php
$base = 0;
$res = calculatedices($base);
if($res < 0){
    echo 'Pifia de '.$res;
}else{
    if($base == 0){
        $res = $res - 30;
    }
    echo 'Tirada de '.$res;
}

function calculatedices($base){
    if($base == 0){
        $base = 0;
    }
    $getbase = $base;
    $high = 90;
    $throwdices = rand( 1 , 100 );
    $base = (int)$getbase;
    if($base >= 200){//En cas de tindre maestria
        //echo '<br>(Maestria) 1: '.$throwdices;
        if($throwdices <= 2){ //Pifia
            $result = rand( -1 , -100 );
            //echo '<br>(Maestria)Pifia 2: '.$result;
            return $result;
        }else{ //Tirada normal
            $result = $throwdices;
            while($throwdices >= $high){ //En cas de que sigui una tirada obert
                    $throwdices = rand( 1 , 100 );
                    $result += $throwdices;
                    //echo '<br>(Maestria)Obert 2: '.$throwdices.' -> '.$result.' | '.$high;
                    if($high != 100){
                        $high++;
                    }
            }
            
            $result += $base;
            return $result;
        }
    }else { //En cas de no tindre maestria
        //echo '<br> 1: '.$throwdices;
        if($throwdices <= 3){  //Pifia
            $result = rand( -1 , -100 );
            //echo '<br>Pifia 2: '.$result;
            return $result;
        }else{
            $result = $throwdices;
            while($throwdices >= $high){ //En cas de que sigui una tirada obert
                    $throwdices = rand( 1 , 100 );
                    $result += $throwdices;
                    //echo '<br>Obert 2: '.$throwdices.' -> '.$result.' | '.$high;
                    if($high != 100){
                        $high++;
                    }
            }
            $result += $base;
            return $result;
        }
    }
}

