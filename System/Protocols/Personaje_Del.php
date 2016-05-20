<?php
$id_personaje=$_GET['id'];
require_once "../../System/Classes/Personaje.php";
require_once "../../System/Classes/Personaje_Objeto.php";
require_once "../../System/Classes/Personaje_HS.php";
$personaje=new Personaje();
$personajeObj=new Personaje_Objeto();
$personajeHS=new Personaje_HS();
$personajeHS=$personajeHS->delete2($id_personaje);
$personajeObj=$personajeObj->delete2($id_personaje);
$personaje=$personaje->delete($id_personaje);
header('Location: ../../zone.php');
?>

