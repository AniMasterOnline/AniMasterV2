<?php
    require_once('../Classes/Usuari.php');
    session_start();
    if(isset($_SESSION['usuari'])){
        $value=$_SESSION['usuari'];

        $id=$value['id_usuari'];
        $user=$value['user'];

        $newPhone = $_POST['phone'];

        $usuari = new Usuari();
        $result = $usuari->modPhone($id, $user, $newPhone);
        if($result){
            $result = $usuari->return_user($id);
            if($result != "error"){
                $_SESSION['usuari'] = $result;
                header('Location: ../../user/');
            }
        }
    }
?>

