<!-- User Menu -- Header content box -->
<?php 
$title='Crear Objeto';
$migas='#Inicio|../index.php#Mesa|../settings/table/#Nueva Objeto';
include "../Public/layouts/head.php";
?>

<!-- Body content box -->
<div class="container" >
    <form method="POST" name="myForm" action="../System/Protocols/Objeto_Crear2.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 cinput m-l-15 ">
                    <h2 class="form-signin-heading">Crear nuevo objeto</h2>
                </div>
                <input type="hidden" name="public" id="public" value="true">
                <div class="col-md-6">
                    <div class="col-md-12 cinput ">
                        <label for="inputNombre" class="sr-only">Nombre</label>
                        <input type="text"  id="inputNombre"  class="form-control" name="nombre" placeholder="Nombre *" required autofocus>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputPeso" class="sr-only">Peso</label>
                        <input type="text"  id="inputPeso"  class="form-control" name="peso" placeholder="Peso *" required>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputPrecio" class="sr-only">Precio</label>
                        <input type="text"  id="inputPrecio"  class="form-control" name="precio" placeholder="Precio *" required>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputDisponibilidad" class="sr-only">Disponibilidad</label>
                        <select class="selectpicker" data-style="btn-primary" data-width="100%" type="text" id="inputDisponibilidad" name="disponibilidad" placeholder="Disponibilidad *" required>
                            <option value="">Disponibilidad</option>
                            <option value="0">0</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputCalidad" class="sr-only">Calidad</label>
                        <select class="selectpicker" data-style="btn-primary" data-width="100%" type="text" id="inputCalidad" name="calidad" placeholder="Calidad *" required>
                            <option value="">Calidad</option>
                            <option value="-5">-5</option>
                            <option value="-10">-10</option>
                            <option value="0">0</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    
                    <div class="col-md-12 cinput ">
                        <label for="inputTipo" class="sr-only">Tipo</label>
                        <?php
                        include "../System/Classes/Tipo.php";
                        $tipo = new Tipo();
                        $tipo=$tipo->view_all();
                        echo '<select type="text" class="selectpicker" data-style="btn-primary" data-width="100%" id="inputTipo" name="tipo" placeholder="Tipo *" required>';
                            echo '<option value="">Tipo</option>';
                        foreach ($tipo as $row) {
                            //var_dump($row);
                            echo '<option value="'.$row->getId_Tipo().'">'.ucfirst($row->getNombre()).'</option>';
                        }
                        echo '</select>';
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 cinput">
                        <label for="inputDescripcion" class="sr-only">Descripción</label>
                        <textarea type="text"  id="inputDescripcion"  class="form-control" name="descripcion" placeholder="Descripción *" rows="10" required></textarea>
                    </div>
                </div>
                <div class="col-md-12 cinput m-l-15">
                    <button class="btn btn-lg btn-success btn-block" type="submit">Crear Objeto</button>
                </div>
            </div>
            
        </div>
    </form>
</div> 
<?php include "../Public/layouts/footer.php";?> 

