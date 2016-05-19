<?php
$id_objeto=$_GET['id_objeto'];
require_once "../Classes/Objeto.php";
require_once "../Classes/Partida_Objeto.php";
$objeto = new Objeto();
$parObj = new Partida_Objeto();
$parObj=$parObj->delete2($id_objeto);
$objeto=$objeto->delete($id_objeto);

header('Location: ../../settings/table/');
?>
