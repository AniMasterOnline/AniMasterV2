<?php
    require_once('../Classes/Partida_Usuari.php');
    $id_partida = $_POST['id_partida'];
    $id_usuario = $_POST['id_usuario'];
    $pos = -1;
    $aceptado = 'false';
    $partida_usuari = new Partida_Usuari($id_usuario, $id_partida, $pos, $aceptado);
    $partida_usuari->add();
?>

