<?php
    session_start();
    if(isset($_SESSION['url'])){
        $url = $_SESSION['url']; // Guarda la $url del ultimo sitio visitado
    }else{
        $url = "../../index.php"; // Si no hay un sitio visitado redirije a /settings/account/
    }
    require_once('../Classes/Partida_Usuari.php');
    $id_usuario = $_GET['idu'];
    $id_partida = $_GET['idp'];
    $partida_usuari = new Partida_Usuari();
    $partida_usuari->signout($id_usuario, $id_partida);
    header('Location:'.$url);
?>

