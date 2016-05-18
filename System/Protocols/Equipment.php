<?php
$id_personaje=$_POST['id_personaje'];
if (isset($_POST['armas'])){
        require_once "../Classes/Personaje_Objeto.php";
        $perObj=new Personaje_Objeto($id_personaje, $_POST['armas']);
        $perObj->add();
}
if (isset($_POST['armadura'])){
        require_once "../Classes/Personaje_Objeto.php";
        $perObj=new Personaje_Objeto($id_personaje, $_POST['armadura']);
        $perObj->add();
}
?>