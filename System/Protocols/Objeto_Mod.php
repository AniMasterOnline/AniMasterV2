<?php
$id_objeto=$_POST['id_objeto'];
$nombre=$_POST['nombre'];
$peso=$_POST['peso'];
$precio=$_POST['precio'];
$disponibilidad=$_POST['disponibilidad'];
$calidad=$_POST['calidad'];
$tipo=$_POST['tipo'];
$descripcion=$_POST['descripcion'];

require_once "../Classes/Objeto.php";
$objeto = new Objeto();
$objeto=$objeto->modObj($id_objeto,$nombre,$descripcion,$peso,$precio,$disponibilidad,$calidad,$tipo);
header('Location: ../../settings/table/');
?>
