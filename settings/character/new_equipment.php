<!-- User Menu -- Header content box -->
<?php 
$title='Equipment';
$migas='#Inicio|../../index.php#Mesa|../../settings/character/#New equipment';
include "../../Public/layouts/head.php";
?>

<!-- Body content box -->
<?php
$id_personaje=$_GET['id_personaje'];
$id_partida=$_GET['id_partida'];
?>
<div class="container" >
    <form method="POST" name="myForm" action="../../System/Protocols/Equipment.php">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 cinput m-l-15 ">
                    <h2 class="form-signin-heading">Crear nuevo equipamentos</h2>                    
                    <input type="hidden" name="id_personaje" value="<?php echo $id_personaje ?>"
                    <input type="hidden" name="id_partida" value="<?php echo $id_partida ?>"
                </div>
                <div class="col-md-6">
                    <h2 class="form-signin-heading">Armas</h2>
                        <?php
                        require_once "../../System/Classes/Objeto.php";
                        $objeto=new Objeto();
                        $objeto=$objeto->viewArmas();
                        foreach ($objeto as $objeto){
                            $nombre=$objeto->getNombre();
                            $id_objeto=$objeto->getId_Objeto();
                        ?>
                    <div class="col-md-6">
                        <input type="checkbox" name="armas" value="<?php echo $id_objeto ?>" id="<?php echo $id_objeto ?>" ><?php echo " ".$nombre ?>
                    </div>
                        <?php  } ?>
                </div>
                <div class="col-md-6">
                    <h2 class="form-signin-heading">Armaduras</h2>
                    <?php
                        require_once "../../System/Classes/Objeto.php";
                        $objeto=new Objeto();
                        $objeto=$objeto->viewArmadura();
                        foreach ($objeto as $objeto){
                            $nombre=$objeto->getNombre();
                            $id_objeto=$objeto->getId_Objeto();
                        ?>
                    <div class="col-md-6">
                        <input type="checkbox" name="armadura" value="<?php echo $id_objeto ?>" id="<?php echo $id_objeto ?>"><?php echo " ".$nombre ?>
                    </div>
                        <?php  } ?>
                </div>
                <div class="col-md-12 cinput m-l-15">
                    <button class="btn btn-lg btn-success btn-block" type="submit">Finalizar</button>
                </div>
            </div>
            
        </div>
    </form>
</div> 
<?php include "../../Public/layouts/footer.php";?> 
