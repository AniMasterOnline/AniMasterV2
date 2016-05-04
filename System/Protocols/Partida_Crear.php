<?php
    require_once('../Classes/Partida.php');
    require_once('../Classes/Partida_Usuari.php');
    session_start();
    if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];
        
        $pos = $_POST['pos'];
        $id_usuario = $value['id_usuario'];
        $nombre=$_POST['nombre'];
        $imagen = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $descripcion = $_POST['descripcion'];
        $anyo = $_POST['anyo'];
        $nv_sobrenatural = $_POST['nivel'];
        $limite = 4;
        
        $p_u = new Partida_Usuari();
        $flag = $p_u->viewPos($id_usuario, $pos);
        if($flag == null){
            move_uploaded_file($imagen_tmp, "../../Public/img/partida/$imagen");

            $partida = new Partida($id_usuario,$nombre,$imagen,$descripcion,$anyo,$nv_sobrenatural,$limite); // Objecte Partida
            $id_partida=$partida->add(); // Primer Insert

            $partida_usuari = new Partida_Usuari($id_usuario, $id_partida, $pos); // Objecte Partida_Usuari
            $partida_usuari->add(); // Segon Insert
            header('Location: ../../settings/table/view_partida.php?pos='.$pos);
        }else{
            header('Location: ../../settings/table/view_partida.php?pos='.$pos);
        }
        
    }
        
    
    
    

    
?>

