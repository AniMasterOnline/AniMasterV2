<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    //var_dump($value);
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id_personaje = $_GET['id'];
    
    require_once "../../System/Classes/Personaje.php";
    $personaje = new Personaje();
    $return=$personaje->viewPersonaje($id_personaje);
    $id_categoria=$return['id_categoria'];
    $nivel2=$return['nivel'];
    $id_partida=$return['id_partida'];
    
}else{
    include '../404/404.php';
}
$title='Modificar Personaje';
$migas='#Index|../../index.php#Zona roleo|../../zone.php# Modificar Personaje 1 / 2';
include "../../Public/layouts/head.php";
?>
<div class="content">
    <div class="col-md-12">
        <div class="col-xs-12">
            <div class="card m-b-5">
                <div class="card-header">
                    <h2><small class="c-white f-400 f-14">Modificar personaje 1 / 2</small></h2>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="progress m-b-5" style="border-radius: 0px;">
                <div class="progress-bar bgm-brown" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66.66666%; border-radius: 0px;">
                  2 / 2
                </div>
            </div>
        </div>
        <div class="col-md-12">
<?php
require_once "../../System/Classes/Nivel.php";
$nivel=new Nivel();
$nivel=$nivel->viewNivel($nivel2);
$puntos = $nivel->getPuntos();
echo "<div class='col-xs-12'> <div class='alert alert-info m-b-10' role='alert'><strong> Puntos totales: ".$puntos;
$limite=0;
$limite2=0;
if($id_categoria == 8 || $id_categoria == 9){
    $limite = 0.5;
    echo "<br>Puntos máximos a invertir en Habilidades Primarias ".$limite2 =$limite*$puntos." puntos </div>";
    
}else{
    $limite = 0.6;
    $limite2 =$limite*$puntos;
    echo "<br>Puntos máximos a invertir en Habilidades Primarias ".$limite2." puntos </div>";
}
$limite_hp = $puntos*0.5;
$limite_le = $limite2 - $limite_hp;
?>

            
<form onchange="myFunction(this.value)" action="mod_personaje2.php?id=<?php echo $id_personaje ?>" method="POST">
    <div class="col-xs-9 m-b-10">
        <?php
            require_once "../../System/Classes/Categoria_HP.php";
            $cat_hp = new Categoria_HP();
            $result=$cat_hp->viewHP1($id_categoria,1);
            $ha = $result['coste'];
            
            $cat_hp = new Categoria_HP();
            $result=$cat_hp->viewHP2($id_categoria,2);
            $hp = $result['coste'];
            
            $cat_hp = new Categoria_HP();
            $result=$cat_hp->viewHP3($id_categoria,3);
            $he = $result['coste'];
            
            $cat_hp = new Categoria_HP();
            $result=$cat_hp->viewHP4($id_categoria,4);
            $le = $result['coste'];
        ?>
        <input type="hidden" name="points" id="limite_hp" value="<?php echo $limite_hp ?>" readonly>
        <input class="form-control bgm-white b-0 z-depth-1 text-center c-green" type="text" name="points" id="limite_hp_fake" value="<?php $rest =  $limite_hp -($return['ha'] + $return['hp'] + $return['he']); echo $rest?>" readonly>
    </div>
    <div class="col-xs-3 m-b-10">
        <input type="hidden" name="points" id="limite_le" value="<?php echo $limite_le ?>" readonly>
        <input class="form-control bgm-white b-0 z-depth-1 text-center c-green" type="text" name="points" id="limite_le_fake" value="<?php echo $return['la'] - $limite_le ?>" readonly>
    </div>
    <input type="hidden" name="puntosT" value="<?php echo $puntos ?>" readonly>
    <div class="col-xs-3">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="max-width:60px;">
            <?php
                echo "Ha - ".$ha;
            ?>
                <input class="form-control" type="hidden" id="ha2" value="<?php echo $ha ?>">
            </span>
            <input class="form-control" type="text" id="ha" name="ha" value="<?php echo $return['ha']/$ha ?>" placeholder="Habilidad ataque" required>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="max-width:60px;">
            <?php
                echo "Hp - ".$hp;
            ?>
                <input class="form-control" type="hidden" id="hp2" value="<?php echo $hp ?>">
            </span>
            <input class="form-control" type="text" id="hp" name="hp" value="<?php echo $return['hp']/$hp ?>" placeholder="Habilidad parada" required>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="max-width:60px;">
            <?php
                echo "He - ".$he;
            ?>
                <input class="form-control" type="hidden" id="he2" value="<?php echo $he ?>">
            </span>
            <input class="form-control" type="text" id="he" name="he"  value="<?php echo $return['he']/$he ?>" placeholder="Habilidad esquiva" required>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="max-width:60px;">
            <?php
                echo "Le - ".$le;
            ?>
                <input class="form-control" type="hidden" id="la2" value="<?php echo $le ?>">
            </span>
            <input class="form-control" type="text" id="la" name="la" value="<?php echo $return['la']/$le ?>"  placeholder="Llevar armadura" required>
        </div>
    </div>
<?php
$return = array($id_categoria,$ha,$hp,$he,$le,$id_personaje,$id_partida);
$_SESSION['arrayMod']=$return;
?>
<div class=" clearfix m-b-5"></div>
    <div class="col-xs-12">
        <input class="btn btn-default bgm-indigo c-white p-0" type="submit" id="submit" value="Siguiente" name="submit" id="submit">
    </div>
</form>

   
<script>
function myFunction(val) {
    flaghp = false;
    flagle = false;
    var ha=document.getElementById("ha").value; //value
    var ha2=document.getElementById("ha2").value; // coste Ha
    
    var hp=document.getElementById("hp").value; //value
    var hp2=document.getElementById("hp2").value; // coste Hp
    
    var he=document.getElementById("he").value; //value
    var he2=document.getElementById("he2").value; // coste He
    
    var la=document.getElementById("la").value; //value
    var la2=document.getElementById("la2").value; // coste La
    
    var limite_hp=document.getElementById("limite_hp").value; // Value real
    
    var limite_le=document.getElementById("limite_le").value; // Value real
    
    var suma_hp = ha*ha2+hp*hp2+he*he2;
    document.getElementById("limite_hp_fake").value = limite_hp - suma_hp;
    if(suma_hp > limite_hp){
        flaghp = false;
        $('#limite_hp_fake').removeClass('c-green');
        $('#limite_hp_fake').addClass('c-red');
    }else{
        flaghp = true;
        $('#limite_hp_fake').removeClass('c-red');
        $('#limite_hp_fake').addClass('c-green');
    }
    
    var suma_le = la*la2;
    document.getElementById("limite_le_fake").value = limite_le - suma_le;
    if(suma_le > limite_le){
        flagle = false;
        $('#limite_le_fake').removeClass('c-green');
        $('#limite_le_fake').addClass('c-red');
    }else{
        flagle = true;
        $('#limite_le_fake').removeClass('c-red');
        $('#limite_le_fake').addClass('c-green');
    }
    
    
    if(flagle && flaghp){
        document.getElementById("submit").disabled = false;
        return false;
    }
    else{
        document.getElementById("submit").disabled = true;
        return true;
    }
    
}
</script>
        </div>
    </div>
</div>
