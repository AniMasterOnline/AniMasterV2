<?php
    require_once('../Classes/Partida.php');
        
        $id_partida=$_POST['id_partida'];
        $partida=new Partida();
        $result = $partida->delete($id_partida);
        header('Location: ../../user/partida.php');
?>

