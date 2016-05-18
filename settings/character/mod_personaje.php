<!-- Header content box -->
<?php 
$title='PNJ';
$migas='#Index|index.php#Partidas de rol';
include "../../Public/layouts/head.php";
?>

Modificar personaje<br>

<?php
$id_personaje=1;
require_once "../../System/Classes/Personaje.php";
$personaje = new Personaje();
$return=$personaje->viewPersonaje($id_personaje);
echo $return['nombre']."<br>";
echo $return['apellido']."<br>";
$id_categoria=$return['id_categoria'];
$nivel2=$return['nivel'];
?>


<?php
require_once "../../System/Classes/Nivel.php";
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
require_once "../../System/Classes/Categoria_HP.php";
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

$return = array($id_categoria,$ha,$hp,$he,$le,$id_personaje);
$_SESSION['arrayMod']=$return;
?>

<form onchange="myFunction(this.value)" action="mod_personaje2.php" method="POST">
    <br>Habilidades Primarias<br>
    Habilidad Ataque
    <input type="text" name="ha" id="ha" value="<?php echo $return['ha']/$ha ?>"><br>
    Habilidad Parada
    <input type="text" name="hp" id="hp" value="<?php echo $return['hp']/$hp ?>"><br>
    Habilidad Esquiva
    <input type="text" name="he" id="he" value="<?php echo $return['he']/$he ?>"><br>
    Llevar Armadura
    <input type="text" name="la" id="la" value="<?php echo $return['la']/$le ?>"><br>
    <input type="hidden" id="laa" name="puntosT" value="<?php echo $puntos ?>">
    <input type="hidden" id="limite_hp" value="<?php echo $limite_hp ?>">
    <input type="hidden" id="ha2" value="<?php echo $ha ?>">
    <input type="hidden" id="hp2" value="<?php echo $hp ?>">
    <input type="hidden" id="he2" value="<?php echo $he ?>">
    <input type="hidden" id="la2" value="<?php echo $le ?>">
    <input type="submit" name="submit" id="submit" value="Siguiente"><br>
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
