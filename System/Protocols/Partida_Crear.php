<?php
    require_once('../Classes/Partida.php');

        $nombre=$_POST['nombre'];
        $desc = $_POST['descripcion'];
        $anyo = $_POST['anyo'];
        $nivel = $_POST['nivel'];
        $imagen = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        
        move_uploaded_file($imagen_tmp, "../../Public/img/partida/$imagen");
        $partida = new Partida($nombre,$desc,$imagen,$anyo,$nivel);
        $db2=$partida->add();
        header('Location: ../../user/');
?>

