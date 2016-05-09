<?php
    require_once('../Classes/Usuario.php');
    $user = $_GET['user'];
    var_dump($user);

    //Declaramos la clase Usuario();
    $usuari = new Usuario();
    $return = $usuari->buscUsuario($user);
    var_dump($return);
?>

