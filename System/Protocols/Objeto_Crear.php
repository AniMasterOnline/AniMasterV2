<?php
$id_partida=$_POST['id_partida'];
$nombre=$_POST['nombre'];
$peso=$_POST['peso'];
$precio=$_POST['precio'];
$disponibilidad=$_POST['disponibilidad'];
$calidad=$_POST['calidad'];
$tipo=$_POST['tipo'];
$descripcion=$_POST['descripcion'];
$public="false";

require_once "../Classes/Objeto.php";
$objeto = new Objeto($nombre,$descripcion,$peso,$precio,$public,$disponibilidad,$calidad,$tipo);
$objeto->add();
//$objeto = new Objeto();
$objeto=$objeto->viewLast();
foreach ($objeto as $objeto){
$id_objeto=$objeto->getId_Objeto();
var_dump($id_objeto);
}
require_once "../Classes/Partida_Objeto.php";
$parObj=new Partida_Objeto($id_objeto,$id_partida);
$parObj->add();
header('Location: ../../settings/table/');
?>
