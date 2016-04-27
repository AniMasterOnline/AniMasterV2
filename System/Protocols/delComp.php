<?php
    require_once('../Classes/Usuari.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];

        $id=$value['id_usuari'];
        $user=$value['nickname'];

        $usuari = new Usuari();
        $result = $usuari->delete($id);
        header('Location: ../../logout.php');
    }
?>

