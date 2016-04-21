<?php
require_once('../Classes/Usuari.php');
    session_start();
    if(isset($_SESSION['usuari'])){
        $value=$_SESSION['usuari'];
        
        $id=$value['id_usuari'];
        $user=$value['user'];
        $credits = $value['saldo'];
        $add  = $_POST['valcredits'];
        
        $newcredits = $credits + $add;
        
        $usuari = new Usuari();
        $result = $usuari->modsaldo($id, $user, $newcredits);
        if($result){
            $result = $usuari->return_user($id);
            if($result != "error"){
                $_SESSION['usuari'] = $result;
                header('Location: ../../user/');
            }
        }
    }

