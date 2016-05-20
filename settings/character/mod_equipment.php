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

require_once "../../System/Classes/Personaje_Objeto.php";
$perObj=new Personaje_Objeto();
$return=$perObj->viewObjPerson2($id_personaje);

?>
<div class="container" >
    <form method="POST" name="myForm" action="../../System/Protocols/Equipment_Mod.php">
        <?php
                    $i=1;
                    foreach( $return as $row){
                        $id_objeto=$row->getId_Objeto();
                        require_once "../../System/Classes/Objeto.php";
                        $objeto=new Objeto();
                        $objeto=$objeto->viewObj($id_objeto);
                        foreach($objeto as $row2){
                            $nombre=$row2->getNombre();
                            echo '<input type="hidden" name="id_objeto'.$i.'" value="'.$id_objeto.'">';
                            $i++;
                        }
                    }
                    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 cinput m-l-15 ">
                    <h2 class="form-signin-heading">Modificar equipamentos</h2>                    
                    <input type="hidden" name="id_personaje" value="<?php echo $id_personaje ?>">
                    <input type="hidden" name="id_partida" value="<?php echo $id_partida ?>">
                    Seleccione 1 arma y 1 armadura únicamente:<br>Tienes selecionado 
                    <?php
                    foreach( $return as $row){
                        $id_objeto=$row->getId_Objeto();
                        require_once "../../System/Classes/Objeto.php";
                        $objeto=new Objeto();
                        $objeto=$objeto->viewObj($id_objeto);
                        foreach($objeto as $row2){
                            $nombre=$row2->getNombre();
                            echo "<b>".$nombre."</b> ";
                        }
                    }
                    ?>
                    selecionado.
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
                        <input type="radio" name="armas" value="<?php echo $id_objeto ?>" id="<?php echo $id_objeto ?>" required><?php echo " ".$nombre ?>
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
                        <input type="radio" name="armadura" value="<?php echo $id_objeto ?>" id="<?php echo $id_objeto ?>" required><?php echo " ".$nombre ?>
                    </div>
                        <?php  } ?>
                </div>
                <div class="col-md-12 cinput m-l-15">
                    <button class="btn btn-lg btn-success btn-block" type="submit">Modificar</button>
                </div>
            </div>
            
        </div>
    </form>
</div> 
<?php include "../../Public/layouts/footer.php";?> 
