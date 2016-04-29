<?php 
// El archivo 
$src_original = '../Public/img/ZenBG.png'; //Ponerla desde JavaScript por parametros 
//Desde donde 
$x1 = 76; 
$y1 = 72; 
//Ancho en pixeles 
$ancho = 448; 
//Alto en pixeles 
$alto = 269; 

Imagick::cropImage($src_original, $x1, $y1, $ancho, $alto);

?>
