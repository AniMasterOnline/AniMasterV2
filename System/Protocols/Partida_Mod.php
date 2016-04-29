<?php
    require_once('../Classes/Partida.php');

        $nombre=$_POST['nombre'];
        $id_partida=$_POST['id_partida'];
        $desc = $_POST['descripcion'];
        $anyo = $_POST['anyo'];
        $nivel = $_POST['nivel'];
        
        $imagen = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        //echo $nombre.$desc.$anyo.$imagen.$nivel.$id_partida;
        move_uploaded_file($imagen_tmp, "../../Public/img/partida/$imagen");
        $partida = new Partida();
        $db2=$partida->modPartida($id_partida,$nombre,$desc,$imagen,$anyo,$nivel);
        header('Location: ../../user/partida.php');
?>

