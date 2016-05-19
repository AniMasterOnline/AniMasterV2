<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    //var_dump($value);
}

if(isset($_GET['id_partida']) && !empty($_GET['id_partida'])){
    /* Requiere_once i gets */
    require_once "../../System/Classes/Partida.php";
    require_once "../../System/Classes/Partida_Usuari.php";
    $id_partida = $_GET['id_partida'];
    $id_usuario = $value['id_usuario'];
    
    /* Comprobacion de si el jugador tiene personaje */
    require_once "../../System/Classes/Personaje.php";
    $personaje = new Personaje();
    $return=$personaje->viewPersonajeUsuario($value['id_usuario'], $id_partida);
    if($return !== null){
       header('location: ../../zone.php'); //redireccion a zona de partidas
       exit();
    }
    /* Comprobacion de si el usuario tiene acceso a la partida o si existe*/
    $partida= new Partida();
    $partida= $partida->viewPartida($id_partida);
    $partida_usuari= new Partida_Usuari();
    $you_can_not_pass = $partida_usuari->testInvited($id_usuario, $id_partida);
    if(empty($partida) || $you_can_not_pass!== true ){
        include '../404/404.php';
    }
    
    /* Variables de la partida */
    $nombre = $partida->getNombre();
    $imagen = $partida->getImagen();
}else{
    include '../404/404.php';
}
$title='Crear Personaje';
$migas='#Index|../../index.php#Zona roleo|../../zone.php#'.$nombre.'# Crear Personaje 2 / 3';
include "../../Public/layouts/head.php";
?>
<div class="content">
    <div class="col-md-12">
        <div class="col-xs-12">
            <div class="card m-b-5">
                <div class="card-header">
                    <h2><?php echo $nombre; ?><small class="c-white f-400 f-14">Crear personaje 2 / 3</small></h2>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="progress m-b-5" style="border-radius: 0px;">
                <div class="progress-bar bgm-brown" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66.66666%; border-radius: 0px;">
                  2 / 3
                </div>
            </div>
        </div>
        <div class="col-md-12">
<?php
$id_categoria=$_POST['categoria'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];
$nivel2=$_POST['nivel'];
$sexo=$_POST['sexo'];
$pelo=$_POST['pelo'];
$ojos=$_POST['ojos'];
$altura=$_POST['altura'];
$peso=$_POST['peso'];
$apariencia=$_POST['apariencia'];
$agi=$_POST['AGI'];
$con=$_POST['CON'];
$des=$_POST['DES'];
$fue=$_POST['FUE'];
$int=$_POST['INT'];
$per=$_POST['PER'];
$pod=$_POST['POD'];
$vol=$_POST['VOL'];
$nacionalidad=$_POST['nacionalidad'];
?>

<?php
require_once "../../System/Classes/Nivel.php";
$nivel=new Nivel();
$nivel=$nivel->viewNivel($nivel2);
$puntos = $nivel->getPuntos();
echo "<div class='col-xs-12'> <div class='alert alert-info' role='alert'><strong> Puntos totales: ".$puntos;
$limite=0;
$limite2=0;
if($id_categoria == 8 || $id_categoria == 9){
    $limite = 0.5;
    echo "</strong><br>Puntos máximos a invertir en Habilidades Primarias ".$limite2 =$limite*$puntos." puntos";
    
}else{
    $limite = 0.6;
    $limite2 =$limite*$puntos;
    echo "</strong><br>Puntos máximos a invertir en Habilidades Primarias ".$limite2." puntos </div></div>";
}
$limite_hp = $puntos*0.5;
?>

<form onchange="myFunction(this.value)" action="<?php echo 'new_personaje3.php?id_partida='.$id_partida; ?>" method="POST">
    <input class="form-control" type="hidden" id="limite_hp" value="<?php echo $limite_hp ?>">
    <input class="form-control" type="hidden" id="laa" name="puntosT" value="<?php echo $puntos ?>">
    <div class="col-xs-3">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="max-width:60px;">
            <?php
                require_once "../../System/Classes/Categoria_HP.php";
                $cat_hp = new Categoria_HP();
                $result=$cat_hp->viewHP1($id_categoria,1);
                $ha = $result['coste'];
                echo "Ha - ".$ha;
            ?>
                <input class="form-control" type="hidden" id="ha2" value="<?php echo $ha ?>">
            </span>
            <input class="form-control" type="text" id="ha" name="ha" placeholder="Habilidad ataque" required>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="max-width:60px;">
            <?php
                $cat_hp = new Categoria_HP();
                $result=$cat_hp->viewHP2($id_categoria,2);
                $hp = $result['coste'];
                echo "Hp - ".$hp;
            ?>
                <input class="form-control" type="hidden" id="hp2" value="<?php echo $hp ?>">
            </span>
            <input class="form-control" type="text" id="hp" name="hp" placeholder="Habilidad parada" required>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="max-width:60px;">
            <?php
                $cat_hp = new Categoria_HP();
                $result=$cat_hp->viewHP3($id_categoria,3);
                $he = $result['coste'];
                echo "He - ".$he;
            ?>
                <input class="form-control" type="hidden" id="he2" value="<?php echo $he ?>">
            </span>
            <input class="form-control" type="text" id="he" name="he" placeholder="Habilidad esquiva" required>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="max-width:60px;">
            <?php
                $cat_hp = new Categoria_HP();
                $result=$cat_hp->viewHP4($id_categoria,4);
                $le = $result['coste'];
                echo "Le - ".$le;
                $return = array($id_categoria,$nombre,$apellido,$edad,$nivel2,$sexo,$pelo,$ojos,$altura,$peso,$apariencia,$agi,$con,$des,$fue,$int,$per,$pod,$vol,$nacionalidad,$ha,$hp,$he,$le);
                $_SESSION['array']=$return;
            ?>
                <input class="form-control" type="hidden" id="la2" value="<?php echo $le ?>">
            </span>
            <input class="form-control" type="text" id="la" name="la" placeholder="Llevar armadura" required>
        </div>
    </div>
    <div class=" clearfix m-b-5"></div>
    <div class="col-xs-12">
        <input class="btn btn-default bgm-indigo c-white p-0" type="submit" id="submit" value="Siguiente" name="submit" id="submit">
    </div>
</form>

    
<script>
function myFunction(val) {
    var ha=document.getElementById("ha").value;
    var ha2=document.getElementById("ha2").value;
    var hp=document.getElementById("hp").value;
    var hp2=document.getElementById("hp2").value;
    var he=document.getElementById("he").value;
    var he2=document.getElementById("he2").value;
    var la=document.getElementById("la").value;
    var la2=document.getElementById("la2").value;
    var limite_hp=document.getElementById("limite_hp").value;
    
    var suma = ha*ha2+hp*hp2+he*he2;
    //var suma = ha*2+hp*2+he*2;
    if(suma > limite_hp){
        alert("Error, solo puedes utilizar 50% de los puntos totals!");
        document.getElementById("submit").disabled = true;
        return false;
    }
    else{
        var suma2 = limite_hp-suma;
        var la3 = la*la2;
        if(suma2<la3){
            alert("Solo puedes utilizar "+suma2+" puntos");
            document.getElementById("submit").disabled = true;
            return false;
        }
        else{
            document.getElementById("submit").disabled = false;
            return true;
        }
    }
    
}
</script>
        </div>
    </div>
</div>
