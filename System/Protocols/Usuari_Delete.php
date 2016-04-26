<?php
    require_once('../Classes/Usuari.php');
    $user_id = $_POST['user_id'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $usuari = new Usuari();
    $result1 = $usuari->verificar_login($user,$pass);
    if( $result1 != null){ 
        $result2 = $usuari->delete($user_id);
        if($result2){
            echo 'succes';
        }else{
            echo 'error2';
        }
    }else{
        echo 'error1';
    }
?>