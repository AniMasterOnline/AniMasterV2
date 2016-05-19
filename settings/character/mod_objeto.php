<!-- User Menu -- Header content box -->
<?php 
$title='Modificar Objeto';
$migas='#Inicio|../../index.php#Mesa|../../settings/table/#Nueva Objeto';
include "../../Public/layouts/head.php";
?>

<?php
$id_objeto=$_GET['id_objeto'];
require_once "../../System/Classes/Objeto.php";
$objeto=new Objeto();
$objeto=$objeto->viewObj($id_objeto);
foreach ($objeto as $objeto){
    $nombre=$objeto->getNombre();
    $peso=$objeto->getPeso();
    $precio=$objeto->getPrecio();
    $disponibilidad=$objeto->getDisponibilidad();
    $calidad=$objeto->getCalidad();
    $tipo2=$objeto->getId_Tipo();
    $desc=$objeto->getDescripcion();
}
?>
<!-- Body content box -->
<div class="container" >
    <form method="POST" name="myForm" action="../../System/Protocols/Objeto_Mod.php">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 cinput m-l-15 ">
                    <h2 class="form-signin-heading">Modificar objeto</h2>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 cinput ">
                        <label for="inputNombre" class="sr-only">Nombre</label>
                        <input type="text"  id="inputNombre"  class="form-control" value="<?php echo $nombre ?>" name="nombre" placeholder="Nombre *" required autofocus>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputPeso" class="sr-only">Peso</label>
                        <input type="text"  id="inputPeso"  class="form-control" name="peso" value="<?php echo $peso ?>" placeholder="Peso *" required>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputPrecio" class="sr-only">Precio</label>
                        <input type="text"  id="inputPrecio"  class="form-control" name="precio" value="<?php echo $precio ?>" placeholder="Precio *" required>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputDisponibilidad" class="sr-only">Disponibilidad</label>
                        <select class="selectpicker" data-style="btn-primary" data-width="100%" type="text" id="inputDisponibilidad" name="disponibilidad" placeholder="Disponibilidad *" required>
                            <option value="<?php echo $disponibilidad ?>">Disponibilidad (<?php echo $disponibilidad ?>)</option>
                            <option value="0">0</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputCalidad" class="sr-only">Calidad</label>
                        <select class="selectpicker" data-style="btn-primary" data-width="100%" type="text" id="inputCalidad" name="calidad" placeholder="Calidad *" required>
                            <option value="<?php echo $calidad ?>">Calidad (<?php echo $calidad ?>)</option>
                            <option value="-5">-5</option>
                            <option value="-10">-10</option>
                            <option value="0">0</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    
                   <input type="hidden" id="id_objeto" name="id_objeto" value="<?php echo $id_objeto ?>">
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 cinput">
                        <label for="inputDescripcion" class="sr-only">Descripcion</label>
                        <textarea type="text"  id="inputDescripcion"  class="form-control" value="" name="descripcion" placeholder="Descripcion *" rows="10" required><?php echo $desc ?></textarea>
                    </div>
                </div>
                <div class="col-md-12 cinput m-l-15">
                    <button class="btn btn-lg btn-success btn-block" type="submit">Modificar Objeto</button>
                </div>
            </div>
            
        </div>
    </form>
</div> 
<?php include "../../Public/layouts/footer.php";?> 