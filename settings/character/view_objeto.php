<!-- User Menu -- Header content box -->
<?php 
$title='Mis Objetos';
$migas='#Inicio|../../index.php#Mesa|../../settings/table/#Mis Objetos';
include "../../Public/layouts/head.php";
?>

<?php
$id_usuario=$value['id_usuario'];
require_once "../../System/Classes/Partida.php";
$partida=new Partida();
$partida=$partida->viewPartida2($id_usuario);
$id_partida=$partida->getId_Partida();

require_once "../../System/Classes/Partida_Objeto.php";
$parObj=new Partida_Objeto();
$parObj=$parObj->view_Objetos_Partida($id_partida);
foreach ($parObj as $parObj){
    $id_objeto=$parObj->getId_Objeto();
    
    require_once "../../System/Classes/Objeto.php";
    $obj=new Objeto();
    $obj=$obj->viewObj($id_objeto);
    foreach ($obj as $obj){
        $nombre=$obj->getNombre();
        $peso=$obj->getPeso();
        $precio=$obj->getPrecio();
        echo $nombre." ".$peso." ".$precio."<a href='mod_objeto.php?id_objeto=".$id_objeto."'><i class='zmdi zmdi-edit c-black f-20 c-green '></i></a>"."<a href='../../System/Protocols/Objeto_Del.php?id_objeto=".$id_objeto."'><i class='zmdi zmdi-delete c-black f-20 c-red '></i></a>"."<br>";
    }
}
?>
<?php include "../../Public/layouts/footer.php";?> 

