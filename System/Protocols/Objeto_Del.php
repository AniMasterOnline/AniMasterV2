<?php
//$id_objeto=$_POST['id_objeto'];
$id_objeto=18;
require_once "../Classes/Objeto.php";
$objeto = new Objeto();
$objeto->delete($id_objeto);
?>
