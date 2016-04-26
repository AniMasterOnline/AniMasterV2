<?php
    require_once('../Classes/Usuari.php');
    session_start();
    if(isset($_SESSION['usuari'])){
        $value=$_SESSION['usuari'];

        $id=$value['id_usuari'];
        $user=$value['user'];
        
        $newAdreca = $_POST['adreca'];
        $newPais = $_POST['pais'];
        $newPoble = $_POST['poble'];
        $newProvincia = $_POST['provincia'];
        $newPostal = $_POST['postal'];

        $usuari = new Usuari();
        $result = $usuari->modContact($id, $user, $newAdreca, $newPais, $newPoble, $newProvincia, $newPostal);
        if($result){
            $result = $usuari->return_user($id);
            if($result != "error"){
                $_SESSION['usuari'] = $result;
                header('Location: ../../user/');
            }
        }
    }
?>

