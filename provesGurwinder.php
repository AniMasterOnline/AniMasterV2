<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php#Partidas de rol';
include "Public/layouts/head.php";?>

<?php
require_once "System/Classes/Habilidades_Primarias.php";
//$busqueda=1;

$partida= new Habilidades_Primarias();
//$result = $partida->view_all();
$result = $partida->viewCat(2);
var_dump($result);
?>