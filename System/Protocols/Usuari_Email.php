<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];

        $id=$value['id_usuario'];

        $newEmail = $_POST['email'];
        $user=$_POST['user'];
        
        $usuari = new Usuario();
        $result = $usuari->modEmail($id, $user, $newEmail);
        if(!isset($_SESSION['user'])){ 
        if( $usuari != null){ 
            echo 'succes';
        }else{
            echo 'fail';
        } 
    }
    }
?>

