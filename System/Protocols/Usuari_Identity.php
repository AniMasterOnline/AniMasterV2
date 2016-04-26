<?php
    require_once('../Classes/Usuari.php');
    session_start();
    if(isset($_SESSION['usuari'])){
        $value=$_SESSION['usuari'];
        $id=$value['id_usuari'];
        $user=$value['user'];

        $newNom = $_POST['nom'];
        $newCognom = $_POST['cognom'];

        $usuari = new Usuari();
        $result = $usuari->modIdentity($id, $user, $newNom, $newCognom);
        if($result){
            $result = $usuari->return_user($id);
            if($result != "error"){
                $_SESSION['usuari'] = $result;
                header('Location: ../../user/');
            }
        }
    }
?>

