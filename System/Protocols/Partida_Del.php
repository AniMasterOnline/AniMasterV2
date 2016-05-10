<?php
    require_once('../Classes/Partida.php');
    require_once('../Classes/Partida_Usuari.php');
    require_once("../Classes/Usuario.php");
    
    session_start();
    if(isset($_SESSION['user'])){
        
        
        $id=$_POST['id'];
        $partida = new Partida();
        $partida2 = new Partida_Usuari();
        $result2 = $partida2->delete($id);
        $result=$partida->delete($id);
        
        $value=$_SESSION['user'];
        $id_usuario = $value['id_usuario'];
        $usuari = new Usuario();
        $pos = ($usuari->returnNum_Partidas($id_usuario) - 1);
        $usuari->modNum_Partidas($id_usuario, $pos); // mod num de partidas actual
    }
        
        
?>