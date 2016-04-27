<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];

        $id=$value['id_usuario'];
        $user=$value['nickname'];

        $newEmail = $_POST['email'];

        $usuari = new Usuario();
        $result = $usuari->modEmail($id, $user, $newEmail);
        if($result){
            $result = $usuari->return_user($id);
            if($result != "error"){
                $_SESSION['usuari'] = $result;
                header('Location: ../../user/');
            }
        }
    }
?>

