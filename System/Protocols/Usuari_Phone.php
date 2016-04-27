<?php
    require_once('../Classes/Usuari.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];

        $id=$value['id_usuari'];
        $user=$value['nickname'];

        $newPhone = $_POST['phone'];

        $usuari = new Usuari();
        $result = $usuari->modPhone($id, $user, $newPhone);
        if($result){
            $result = $usuari->return_user($id);
            if($result != "error"){
                $_SESSION['user'] = $result;
                header('Location: ../../user/');
            }
        }
    }
?>

