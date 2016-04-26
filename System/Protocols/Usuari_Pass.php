<?php
    require_once('../Classes/Usuari.php');
    session_start();
    if(isset($_SESSION['usuari'])){
        $value=$_SESSION['usuari'];

        $id=$value['id_usuari'];
        $user=$value['user'];

        $newPass = md5($_POST['pass']);

        $usuari = new Usuari();
        $result = $usuari->modPass($id, $user, $newPass);
        if($result){
            echo ' <b>Succes : </b> true';
            $result = $usuari->return_user($id);
            if($result != "error"){
                $_SESSION['usuari'] = $result;
                header('Location: ../../user/');
            }
        }
    }
?>
