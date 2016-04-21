<?php
    require_once('../Classes/Usuari.php');
    
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $usuari = new Usuari();
    $usuari = $usuari->verificar_login($user,$pass);
    if(!isset($_SESSION['usuari'])){ 
        if( $usuari != null){ 
            session_start();
            $_SESSION['usuari'] = $usuari;
            echo 'succes';
        }else{
            echo 'fail';
        } 
    }
