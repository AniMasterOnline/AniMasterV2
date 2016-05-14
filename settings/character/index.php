<?php
if(isset($_GET['id_partida']) && !empty($_GET['id_partida'])){
    $id_partida = $_GET['id_partida'];
    // Buscar aqui personaje del usuario en esta partida y si no tiene redirijir a crear personaje
    
    header('location: view_personaje.php?id_personaje='.$id_partida); //redireccion temporal a panel del personaje
}else{
    include '../404/404.php';
}
?>

