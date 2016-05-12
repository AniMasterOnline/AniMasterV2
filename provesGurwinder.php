<!-- Header content box -->
<?php 
$title='PNJ';
$migas='#Index|index.php#Partidas de rol';
include "Public/layouts/head.php";
?>

Crear personaje<br>
<form action="provesGurwinder2.php" method="POST">
    <?php
    include "System/Classes/Categoria.php";
    $categoria = new Categoria();
    $categoria=$categoria->view_all();
    echo '<select class="input" type="text" id="categoria" name="categoria" placeholder="Categoria" requireeeeed>';
    foreach ($categoria as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getId_Categoria().'">'.$row->getNombre().'</option>';
    }
    echo '</select>';
    ?>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" requireeeeed>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido" requireeeeed>
    <input type="text" id="edad" name="edad" placeholder="Edad" requireeeeed>
    <?php
    include "System/Classes/Nivel.php";
    $nivel = new Nivel();
    $nivel=$nivel->view_all();
    echo '<select class="input" type="text" id="nivel" name="nivel" placeholder="Nivel" requireeeeed>';
    echo '<option value="">Nivel</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getNivel().'">'.$row->getNivel()." (".$row->getPuntos().")".'</option>';
    }
    echo '</select>';
    ?>
    <input type="radio" name="sexo" value="male" checked>Hombre
    <input type="radio" name="sexo" value="female"> Female
    <input type="text" id="pelo" name="pelo" placeholder="Pelo" requireeeeed>
    <input type="text" id="ojos" name="ojos" placeholder="Ojos" requireeeeed>
    <input type="text" id="altura" name="altura" placeholder="Altura" requireeeeed>
    <input type="text" id="peso" name="peso" placeholder="Peso" requireeeeed>
    <input type="text" id="apariencia" name="apariencia" placeholder="Apariencia" requireeeeed>
    <?php
    include "System/Classes/Caracteristicas_P.php";
    $nivel = new Caracteristicas_P();
    $nivel=$nivel->view_all();
    echo '<select class="input" type="text" id="c_AGI" name="AGI" placeholder="AGI" requireeeeed>';
    echo '<option value="">AGI</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_CON" name="CON" placeholder="CON" requireeeeed>';
    echo '<option value="">CON</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_DES" name="DES" placeholder="DES" requireeeeed>';
    echo '<option value="">DES</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_FUE" name="FUE" placeholder="FUE" requireeeeed>';
    echo '<option value="">FUE</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_INT" name="INT" placeholder="INT" requireeeeed>';
    echo '<option value="">INT</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_PER" name="PER" placeholder="PER" requireeeeed>';
    echo '<option value="">PER</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_POD" name="POD" placeholder="POD" requireeeeed>';
    echo '<option value="">POD</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_VOL" name="VOL" placeholder="VOL" requireeeeed>';
    echo '<option value="">VOL</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    include "System/Classes/Nacionalidad.php";
    $nac = new Nacionalidad();
    $nac=$nac->view_all();
    echo '<select class="input" type="text" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad" requireeeeed>';
    echo '<option value="">Nacionalidad</option>';
    foreach ($nac as $ro) {
        echo '<option value="'.$ro->getId().'">'.$ro->getNombre().'</option>';
    }
    echo '</select>';
    ?>
    <input type="submit" id="submit" name="submit" value="Siguiente" requireeeeed>
    <!---Turno, tamanyo-->
</form>
