<?php
$id_personaje=$_POST['id'];
require_once "../../System/Classes/Personaje.php";
$personaje=new Personaje();
$personaje=$personaje->delete($id_personaje);
?>

