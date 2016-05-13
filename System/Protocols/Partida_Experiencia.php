<?php
    require_once('../Classes/Personaje.php');
    
    $id_partida = $_POST['id_partida'];     //1
    $entrada = $_POST['personaje'];         //2_darkAsasin
    $entrada2 = explode("_", $entrada);
    
    $id_personaje = $entrada2[0];
    //var_dump($id_personaje);
    
    $Nombrepersonaje = $entrada2[1];
    //var_dump($Nombrepersonaje);
    
    if(empty($_POST['expe'])){
        $experiencia_Nova = 0;
    }else{
        $experiencia_Nova = $_POST['expe'];          //21
    }
    //echo $id_partida.' '.$usuario.' '.$newExpe;
    
    //Update de la experiencia final
    $personaje = new Personaje();
    $result = $personaje->updateExpe($experiencia_Nova,$id_personaje);
    
    if ($result){
        echo 'success'; 
    }else{
        echo 'fail';
    }
    
    
?>

