<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php#Partidas de rol';
include "Public/layouts/head.php";?>

<?php
require_once "System/Classes/Personaje_Habilidades.php";
//$busqueda=1;

$partida= new Personaje_Habilidades();
$result = $partida->view_all();
//$result = $partida->viewNivel(2);
var_dump($result);
?>