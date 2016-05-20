<!-- User Menu -- Header content box -->
<?php 
$title='Armaduras';
$migas='#Inicio|../../index.php#Mesa|../../settings/character/#Armas';
include "../../Public/layouts/head.php";
?>

<!-- Body content box -->
<div class="container" >
    <form method="POST" name="myForm" action="../../System/Protocols/Crear_Armaduras.php">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 cinput m-l-15 ">
                    <h2 class="form-signin-heading">Armaduras</h2>
                </div>
<?php
$id_objeto=1;
require_once "../../System/Classes/Caracteristica.php";
$caracteristica=new Caracteristica();
$caracteristica=$caracteristica->viewArmaduras();
foreach ($caracteristica as $caracteristica){
    $nombre=$caracteristica->getNombre();
    $id_caracteristica=$caracteristica->getId_Caracteristica();
?>
                <div class="col-md-6">
                    <div class="col-md-12 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1" style="max-width:200px;"><?php echo $nombre ?></span>
                            <label for="<?php echo $nombre ?>" class="sr-only"><?php echo $nombre ?></label>
                            <input type="text"  id="<?php echo $nombre ?>" value="" class="form-control" name="<?php echo 'v'.$id_caracteristica ?>" placeholder="<?php echo $nombre ?> *" required>
                            <input type="hidden"  id="<?php echo $id_caracteristica ?>"  class="form-control" name="<?php echo $id_caracteristica ?>" value="<?php echo $id_caracteristica ?>" required>
                            <input type="hidden"  id="id_objeto"  class="form-control" name="id_objeto" value="<?php echo $id_objeto ?>" required>
                        </div>
                    </div>
                </div>
<?php } ?>     
                <div class="col-md-12 cinput m-l-15">
                    <button class="btn btn-lg btn-success btn-block" name="submit" id="submit" type="submit">Crear armaduras</button>
                </div>
            </div>
            <?php
                if(isset($_GET['id_partida']) && !empty($_GET['id_partida'])){
                    echo '<input type="hidden"  id="id_partida"  class="form-control" name="id_partida" value="'.$_GET['id_partida'].'">';
                }
            ?>
        </div>
    </form>
</div> 
<?php include "../../Public/layouts/footer.php";?> 

