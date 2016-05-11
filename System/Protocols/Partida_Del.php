<?php
    require_once('../Classes/Partida.php');
    require_once('../Classes/Partida_Usuari.php');
        
        $id=$_POST['id'];
        $partida = new Partida();
        $partida2 = new Partida_Usuari();
        $result2 = $partida2->delete($id);
        $result=$partida->delete($id);
        if($result){
            echo 'succes';
        }else{
            echo 'fail';
        }
        
?>