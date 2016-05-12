<!-- Header content box -->
<?php 
$title='PNJ';
$migas='#Index|index.php#Partidas de rol';
include "Public/layouts/head.php";
?>

Crear personaje<br>
<?php
//$id_categoria=$_POST['categoria'];
$id_categoria=1;
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
echo "apellido ".$apellido;
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
HP<br>
<?php

require_once "System/Classes/Nivel.php";
$nivel=new Nivel();
$nivel=$nivel->viewNivel($nivel2);
$puntos = $nivel->getPuntos();
echo "Puntos totales: ".$puntos;
$limite=0;
$limite2=0;
if($id_categoria == 8 || $id_categoria == 9){
    $limite = 0.5;
    echo "<br>Puntos máximos a invertir en Habilidades Primarias ".$limite2 =$limite*$puntos." puntos";
    
}else{
    $limite = 0.6;
    $limite2 =$limite*$puntos;
    echo "<br>Puntos máximos a invertir en Habilidades Primarias ".$limite2." puntos";
}
echo "<br>".$limite2;
$limite_hp = $puntos*0.5;
?>
<br>Los costes son:<br>
<?php
require_once "System/Classes/Categoria_HP.php";
$cat_hp = new Categoria_HP();
$cat_hp=$cat_hp->viewHP1($id_categoria,1);
foreach($cat_hp as $cat_h){
    $ha=$cat_h->getCoste();
    echo "HA ".$ha;
}
$cat_hp = new Categoria_HP();
$cat_hp2=$cat_hp->viewHP2($id_categoria,2);
foreach($cat_hp2 as $cat_h2){
    $hp=$cat_h2->getCoste();
    echo "Hp ".$hp;
}
$cat_hp=$cat_hp->viewHP3($id_categoria,3);
foreach($cat_hp as $cat_h){
    $he=$cat_h->getCoste();
    echo "He ".$he;
}
$cat_hp = new Categoria_HP();
$cat_hp=$cat_hp->viewHP4($id_categoria,4);
foreach($cat_hp as $cat_h){
    $le=$cat_h->getCoste();
    echo "Le ".$le;
}

$array = array($id_categoria,$nombre,$apellido,$edad,$nivel2,$sexo,$pelo,$ojos,$altura,$peso,$apariencia,$agi,$con,$des,$fue,$int,$per,$pod,$vol,$nacionalidad,$ha,$hp,$he,$le);
$_SESSION['array']=$array;
?>

<form onchange="myFunction(this.value)" action="provesGurwinder3.php" method="POST">
    <input type="text" id="ha" name="ha" placeholder="Habilidad ataque">
    <input type="hidden" id="limite_hp" value="<?php echo $limite_hp ?>">
    <input type="hidden" id="ha2" value="<?php echo $ha ?>">
    <input type="hidden" id="hp2" value="<?php echo $hp ?>">
    <input type="hidden" id="he2" value="<?php echo $he ?>">
    <input type="hidden" id="la2" value="<?php echo $le ?>">
    <input type="text" id="hp" name="hp" placeholder="Habilidad parada">
    <input type="text" id="he" name="he" placeholder="Habilidad esquiva">
    <input type="text" id="la" name="la" placeholder="Llevar armadura">
    <input type="hidden" id="laa" name="puntosT" value="<?php echo $puntos ?>">
    <input type="submit" id="submit" value="Siguiente" name="submit" id="submit">
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