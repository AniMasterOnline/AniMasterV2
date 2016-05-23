<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    //var_dump($value);
}

if(isset($_GET['id_partida']) && !empty($_GET['id_partida'])){
    /* Requiere_once i gets */
    require_once "../../System/Classes/Partida.php";
    require_once "../../System/Classes/Partida_Usuari.php";
    $id_partida = $_GET['id_partida'];
    $id_usuario = $value['id_usuario'];
    
    /* Comprobacion de si el jugador tiene personaje */
    require_once "../../System/Classes/Personaje.php";
    $personaje = new Personaje();
    $return=$personaje->viewPersonajeUsuario($value['id_usuario'], $id_partida);
    if($return !== null){
       header('location: ../../zone.php'); //redireccion a zona de partidas
       exit();
    }
    /* Comprobacion de si el usuario tiene acceso a la partida o si existe*/
    $partida= new Partida();
    $partida= $partida->viewPartida($id_partida);
    $partida_usuari= new Partida_Usuari();
    $you_can_not_pass = $partida_usuari->testInvited($id_usuario, $id_partida);
    if(empty($partida) || $you_can_not_pass!== true ){
        include '../404/404.php';
    }
    
    /* Variables de la partida */
    $nombre = $partida->getNombre();
    $imagen = $partida->getImagen();
}else{
    include '../404/404.php';
}
$title='Crear Personaje';
$migas='#Index|../../index.php#Zona roleo|../../zone.php#'.$nombre.'# Crear Personaje 1 / 3';
include "../../Public/layouts/head.php";
?>


<div class="content">
    <div class="col-md-12">
        <div class="col-xs-12">
            <div class="card m-b-5">
                <div class="card-header">
                    <h2><?php echo $nombre; ?><small class="c-white f-400 f-14">Crear personaje 1 / 3</small></h2>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="progress m-b-5" style="border-radius: 0px;">
                <div class="progress-bar bgm-brown" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 33.3333333%; border-radius: 0px;">
                  1 / 3
                </div>
            </div>
        </div>
        <form action="<?php echo 'new_personaje2.php?id_partida='.$id_partida; ?>" method="POST">
            <?php
            include "../../System/Classes/Categoria.php";
            $categoria = new Categoria();
            $categoria=$categoria->view_all();
            echo '<div class="col-xs-6"><select class="form-control" type="text" id="categoria" name="categoria" placeholder="Categoria" required>';
            echo '<option disabled selected value> Categoria</option>';
            foreach ($categoria as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getId_Categoria().'">'.$row->getNombre().'</option>';
            }
            echo '</select></div>';
            ?>


            <?php
            include "../../System/Classes/Nivel.php";
            $nivel = new Nivel();
            $nivel=$nivel->view_all();
            echo '<div class="col-xs-6"><select class="input form-control" type="text" id="nivel" name="nivel" placeholder="Nivel" required>';
            echo '<option value="">Nivel</option>';
            foreach ($nivel as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getNivel().'">'.$row->getNivel()." (".$row->getPuntos().")".'</option>';
            }
            echo '</select></div><div class="clearfix m-b-5"></div>';
            ?>
            <div class="col-xs-6">
                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido" required>
            </div>
            <div class="clearfix m-b-5"></div>
            <div class="col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="sexo" value="male"> <i class="zmdi zmdi-male-alt"></i> M
                    </span>
                    <span class="input-group-addon">
                        <input type="radio" name="sexo" value="female"> <i class="zmdi zmdi-female"></i> F
                    </span>
                    <input class="form-control" type="number" id="edad" name="edad" placeholder="Edad" required>
                </div><!-- /input-group -->
            </div>
            <div class="clearfix m-b-5"></div>
            <div class="col-xs-6">
                <input class="form-control" type="text" id="pelo" name="pelo" placeholder="Pelo" required>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" id="ojos" name="ojos" placeholder="Ojos" required>
            </div>
            <div class="clearfix m-b-5"></div>
            <div class="col-xs-6">
                <input class="form-control" type="text" id="altura" name="altura" placeholder="Altura" required>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" id="peso" name="peso" placeholder="Peso" required>
            </div>
            <div class="clearfix m-b-5"></div>
            <div class="col-xs-12 m-b-5">
                <input class="form-control" type="number" id="apariencia" name="apariencia" placeholder="Apariencia" required>
            </div>
            <?php
            include "../../System/Classes/Caracteristicas_P.php";
            $nivel = new Caracteristicas_P();
            $nivel=$nivel->view_all();
            echo '<div class="col-xs-3"><select class="input form-control" type="text" id="c_AGI" name="AGI" placeholder="AGI" required>';
            echo '<option value="">AGI</option>';
            foreach ($nivel as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
            }
            echo '</select></div>';
            ?>
            <?php
            echo '<div class="col-xs-3"><select class="input form-control" type="text" id="c_CON" name="CON" placeholder="CON" required>';
            echo '<option value="">CON</option>';
            foreach ($nivel as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
            }
            echo '</select></div>';
            ?>
            <?php
            echo '<div class="col-xs-3"><select class="input form-control" type="text" id="c_DES" name="DES" placeholder="DES" required>';
            echo '<option value="">DES</option>';
            foreach ($nivel as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
            }
            echo '</select></div>';
            ?>
            <?php
            echo '<div class="col-xs-3"><select class="input form-control" type="text" id="c_FUE" name="FUE" placeholder="FUE" required>';
            echo '<option value="">FUE</option>';
            foreach ($nivel as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
            }
            echo '</select></div><div class="clearfix m-b-5"></div>';
            ?>
            <?php
            echo '<div class="col-xs-3"><select class="input form-control" type="text" id="c_INT" name="INT" placeholder="INT" required>';
            echo '<option value="">INT</option>';
            foreach ($nivel as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
            }
            echo '</select></div>';
            ?>
            <?php
            echo '<div class="col-xs-3"><select class="input form-control" type="text" id="c_PER" name="PER" placeholder="PER" required>';
            echo '<option value="">PER</option>';
            foreach ($nivel as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
            }
            echo '</select></div>';
            ?>
            <?php
            echo '<div class="col-xs-3"><select class="input form-control" type="text" id="c_POD" name="POD" placeholder="POD" required>';
            echo '<option value="">POD</option>';
            foreach ($nivel as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
            }
            echo '</select></div>';
            ?>
            <?php
            echo '<div class="col-xs-3"><select class="input form-control" type="text" id="c_VOL" name="VOL" placeholder="VOL" required>';
            echo '<option value="">VOL</option>';
            foreach ($nivel as $row) {
                //var_dump($row);
                echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
            }
            echo '</select></div><div class="clearfix m-b-5"></div>';
            ?>
            <?php
            include "../../System/Classes/Nacionalidad.php";
            $nac = new Nacionalidad();
            $nac=$nac->view_all();
            echo '<div class="col-xs-12 m-b-5"><select class="input form-control" type="text" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad" required>';
            echo '<option value="">Nacionalidad</option>';
            foreach ($nac as $ro) {
                echo '<option value="'.$ro->getId().'">'.$ro->getNombre().'</option>';
            }
            echo '</select></div>';
            ?>
            <div class="col-xs-12">
                <input class="btn btn-default bgm-indigo c-white p-0" type="submit" id="submit" name="submit" value="Siguiente" required>
            </div>
            <!---Turno, tamanyo-->
        </form>
    </div>
</div>
