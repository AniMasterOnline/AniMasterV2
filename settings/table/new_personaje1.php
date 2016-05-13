<!-- Header content box -->
<?php 
$title='PNJ';
$migas='#Index|index.php#Partidas de rol';
include "../../Public/layouts/head.php";
?>

Crear personaje<br>
<form action="new_personaje2.php" method="POST">
    <?php
    include "../../System/Classes/Categoria.php";
    $categoria = new Categoria();
    $categoria=$categoria->view_all();
    echo '<select class="input" type="text" id="categoria" name="categoria" placeholder="Categoria" required>';
    foreach ($categoria as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getId_Categoria().'">'.$row->getNombre().'</option>';
    }
    echo '</select>';
    ?>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
    <input type="text" id="edad" name="edad" placeholder="Edad" required>
    <?php
    include "../../System/Classes/Nivel.php";
    $nivel = new Nivel();
    $nivel=$nivel->view_all();
    echo '<select class="input" type="text" id="nivel" name="nivel" placeholder="Nivel" required>';
    echo '<option value="">Nivel</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getNivel().'">'.$row->getNivel()." (".$row->getPuntos().")".'</option>';
    }
    echo '</select>';
    ?>
    <input type="radio" name="sexo" value="male" checked>Hombre
    <input type="radio" name="sexo" value="female"> Female
    <input type="text" id="pelo" name="pelo" placeholder="Pelo" required>
    <input type="text" id="ojos" name="ojos" placeholder="Ojos" required>
    <input type="text" id="altura" name="altura" placeholder="Altura" required>
    <input type="text" id="peso" name="peso" placeholder="Peso" required>
    <input type="text" id="apariencia" name="apariencia" placeholder="Apariencia" required>
    <?php
    include "../../System/Classes/Caracteristicas_P.php";
    $nivel = new Caracteristicas_P();
    $nivel=$nivel->view_all();
    echo '<select class="input" type="text" id="c_AGI" name="AGI" placeholder="AGI" required>';
    echo '<option value="">AGI</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_CON" name="CON" placeholder="CON" required>';
    echo '<option value="">CON</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_DES" name="DES" placeholder="DES" required>';
    echo '<option value="">DES</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_FUE" name="FUE" placeholder="FUE" required>';
    echo '<option value="">FUE</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_INT" name="INT" placeholder="INT" required>';
    echo '<option value="">INT</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_PER" name="PER" placeholder="PER" required>';
    echo '<option value="">PER</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_POD" name="POD" placeholder="POD" required>';
    echo '<option value="">POD</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    echo '<select class="input" type="text" id="c_VOL" name="VOL" placeholder="VOL" required>';
    echo '<option value="">VOL</option>';
    foreach ($nivel as $row) {
        //var_dump($row);
        echo '<option value="'.$row->getBase().'">'.$row->getBase()." (".$row->getBono().")".'</option>';
    }
    echo '</select>';
    ?>
    <?php
    include "../../System/Classes/Nacionalidad.php";
    $nac = new Nacionalidad();
    $nac=$nac->view_all();
    echo '<select class="input" type="text" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad" required>';
    echo '<option value="">Nacionalidad</option>';
    foreach ($nac as $ro) {
        echo '<option value="'.$ro->getId().'">'.$ro->getNombre().'</option>';
    }
    echo '</select>';
    ?>
    <input type="submit" id="submit" name="submit" value="Siguiente" required>
    <!---Turno, tamanyo-->
</form>
