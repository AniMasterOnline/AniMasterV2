<?php
    require_once('../Classes/Usuario.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];

        $id=$value['id_usuario'];
        $user=$value['nickname'];

        $newImatge = $_FILES['imatge']['name'];
        $newImatge_tmp = $_FILES['imatge']['tmp_name'];
        $temp = explode(".", $_FILES["imatge"]["name"]);
	$newName = $value['id_usuario'] . '.' . end($temp);
        
        move_uploaded_file($newImatge_tmp, "../../Public/img/usuarios/$newName");

        $usuari = new Usuario();
        $result = $usuari->modImage($id, $user, $newName);
        if($result){
            $result = $usuari->return_user($id);
            if($result != "error"){
                $_SESSION['user'] = $result;
                header('Location: ../../user/');
            }
        }
    }
?>

