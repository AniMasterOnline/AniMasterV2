<?php
    require_once('../Classes/Usuari.php');
    $username = $_POST['userName'];
    $Usuari = new Usuari();
    $rtn = $Usuari->verificar_user($username);
    if ($rtn){
        echo 'yes';
    }else{
        echo 'no';
    }
?>