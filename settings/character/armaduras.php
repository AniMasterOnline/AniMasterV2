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
require_once "../../System/Classes/Caracteristica.php";
$caracteristica=new Caracteristica();
$caracteristica=$caracteristica->viewArmaduras();
foreach ($caracteristica as $caracteristica){
    $nombre=$caracteristica->getNombre();
?>
                <div class="col-md-6">
                    <div class="col-md-12 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1" style="max-width:30px;"><?php echo $nombre ?></span>
                            <label for="<?php echo $nombre ?>" class="sr-only"><?php echo $nombre ?></label>
                            <input type="text"  id="<?php echo $nombre ?>"  class="form-control" name="<?php echo $nombre ?>" placeholder="<?php echo $nombre ?> *" required>
                        </div>
                    </div>
                </div>
<?php } ?>     
                <div class="col-md-12 cinput m-l-15">
                    <button class="btn btn-lg btn-success btn-block" name="submit" id="submit" type="submit">Crear armaduras</button>
                </div>
            </div>
            
        </div>
    </form>
</div> 
<?php include "../../Public/layouts/footer.php";?> 

