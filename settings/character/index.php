<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    if(isset($_GET['id_partida']) && !empty($_GET['id_partida'])){
        $id_partida = $_GET['id_partida'];
        
        require_once "../../System/Classes/Personaje.php";
        $personaje = new Personaje();
        $return=$personaje->viewPersonajeUsuario($value['id_usuario'], $id_partida);
        
        if($return !== null){
           header('location: view_personaje.php?id_personaje='.$return['id_personaje'].'&id_partida='.$id_partida); //redireccion al Panel de gestion del personaje
        }else{
           header('location: new_personaje1.php?id_partida='.$id_partida); //redireccion a crear Personaje
        }
    }else{
        include '../404/404.php';
    }
}else{
    include '../404/404.php';
}


?>

