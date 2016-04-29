<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        // Datos de la session
        $value=$_SESSION['user'];
        $id=$value['id_usuario'];
        
        //Datos recibidos "POST"
        $newMail = $_POST['email'];
        $newUser =$_POST['user'];
        
        // Comprobar si los datos nuevos son iguales que los que tiene el usuario
        $usuari = new Usuario();
        $userflag = $usuari->userflag($id, $newUser);
        $mailflag = $usuari->mailflag($id, $newMail);
        
        // Comprobar si los datos nuevos ya existen en la BD
        $userexiste = $usuari->userexiste($newUser);
        $mailexiste = $usuari->mailexiste($newMail);
        
        //Condiciones if else
        if($userflag == 'no' && $userexiste == 'no'){
            $usuari->modUser($id,$newUser);
        }
        if($mailflag == 'no' && $mailexiste == 'no'){
            $result = $usuari->modEmail($id,$newMail);
        }
        
        if($userflag == 'no' && $userexiste == 'yes' ||$mailflag == 'no' && $mailexiste == 'yes'){
            echo '101';
        }else if($userflag == 'yes' && $userexiste == 'no' ||$mailflag == 'yes' && $mailexiste == 'no'){
            echo '102';
        }
        
        $usuari = $newUsuari->return_user($id);
        if( $usuari != null){ 
            session_start();
            $_SESSION['user'] = $usuari;
            echo 'succes';
        }
        
        if(!isset($_SESSION['user'])){ 
            if( $usuari != null){ 
                
            }else{
                echo 'fail';
            } 
        }
    }
?>

