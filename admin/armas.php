<!-- User Menu -- Header content box -->
<?php 
$title='Armas';
$migas='#Inicio|../index.php#Mesa|../settings/character/#Armas';
include "../Public/layouts/head.php";
?>

<!-- Body content box -->
<div class="container" >
    <form method="POST" name="myForm" action="../System/Protocols/Crear_Armas2.php">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 cinput m-l-15 ">
                    <h2 class="form-signin-heading">Armas</h2>
                </div>
<?php
$id_objeto=$_GET['id_objeto'];
require_once "../System/Classes/Caracteristica.php";
$caracteristica=new Caracteristica();
$caracteristica=$caracteristica->viewArma();
foreach ($caracteristica as $caracteristica){
    $nombre=$caracteristica->getNombre();
    $id_caracteristica=$caracteristica->getId_Caracteristica();
?>
                <div class="col-md-6">
                    <div class="col-md-12 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><?php echo $nombre ?></span>
                            <label for="<?php echo $nombre ?>" class="sr-only"><?php echo $nombre ?></label>
                            <input type="text"  value="" id="<?php echo $nombre ?>"  class="form-control" name="<?php echo 'v'.$id_caracteristica ?>" placeholder="<?php echo $nombre ?> *" requireeed>
                            <input type="hidden"  id="<?php echo $id_caracteristica ?>"  class="form-control" name="<?php echo $id_caracteristica ?>" value="<?php echo $id_caracteristica ?>">
                            <input type="hidden"  id="id_objeto"  class="form-control" name="id_objeto" value="<?php echo $id_objeto ?>">
                        </div>
                    </div>
                </div>
<?php } ?>     
                <div class="col-md-12 cinput m-l-15">
                    <button class="btn btn-lg btn-success btn-block" name="submit" id="submit" type="submit">Crear armas</button>
                </div>
            </div>
        </div>
    </form>
</div> 
<?php include "../Public/layouts/footer.php";?> 

