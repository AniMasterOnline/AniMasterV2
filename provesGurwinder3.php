<?php 
$title='PNJ';
$migas='#Index|index.php#Partidas de rol';
include "Public/layouts/head.php";
?>

<?php
$arr=$_SESSION['array'];
var_dump($arr);
$id_categoria=$arr[0];
$ha2=$arr[20];
$hp2=$arr[21];
$he2=$arr[22];
$le2=$arr[23];
//$ha=2;
$ha=$_POST['ha'];
$hp=$_POST['hp'];
//$hp=2;
$he=$_POST['he'];
//$he=2;
$le=$_POST['la'];
//$le=2;
$puntosF=$_POST['puntosT'];
//$puntosF=200;

$suma = $ha*$ha2+$he*$he2+$hp*$hp2;
$suma2 = $le*$le2;
$suma3= $suma+$suma2;
$limite_hp = $puntosF-($suma3);
echo "<br>Te queden ".$limite_hp." puntos<br>";
?>

Habilidad secundaria<br>
<?php
    require_once "System/Classes/Categoria_HS.php";
    $categoria=new Categoria_HS();
    $categoria=$categoria->viewHS($id_categoria);
    //var_dump($categoria);
    $i=0;
    ?>
<form onchange="myFunction(this.value)" action="provesGurwinder4.php" method="POST">
        <?php
    foreach ($categoria as $categoria){
        $id_HS = $categoria->getId_HS();
        $coste = $categoria->getCoste();
        require_once "System/Classes/Habilidades_Secundarias.php";
        $hs=new Habilidades_Secundarias();
        $hs=$hs->view_HS($id_HS);
        foreach ($hs as $has){
            $name = $has->getNombre();
        echo '<input type="hidden" name="coste'.$id_HS.'" id="coste'.$id_HS.'" value="'.$coste.'">';
        echo '<div class="input-group">
      <span class="input-group-addon" id="basic-addon1">'.$coste.'</span>
      <span class="input-group-addon" id="basic-addon1">'.$name.'</span>';
        echo '<input type="text" name="hs'.$id_HS.'" id="hs'.$id_HS.'" class="form-control" aria-describedby="basic-addon1"></div>';
    }
}
?>

    <input type="hidden" name="puntosF" id="puntosF" value="<?php echo $limite_hp; ?>">
    <input type="hidden" name="suma3" id="suma3" value="<?php echo $suma3; ?>">
    <input type="hidden" name="puntos_totals" id="puntos_totals" value="<?php echo $puntosF; ?>">
    <input type="submit" name="submit" id="submit" value="Crear">
</form>
<script>
function myFunction(val) {
    var coste1=document.getElementById("coste1").value;
    var coste2=document.getElementById("coste2").value;
    var coste3=document.getElementById("coste3").value;
    var coste4=document.getElementById("coste4").value;
    var coste5=document.getElementById("coste5").value;
    var coste6=document.getElementById("coste6").value;
    var coste7=document.getElementById("coste7").value;
    var coste8=document.getElementById("coste8").value;
    var coste9=document.getElementById("coste9").value;
    var coste10=document.getElementById("coste10").value;
    var coste11=document.getElementById("coste11").value;
    var coste12=document.getElementById("coste12").value;
    var coste13=document.getElementById("coste13").value;
    var coste14=document.getElementById("coste14").value;
    var coste15=document.getElementById("coste15").value;
    var coste16=document.getElementById("coste16").value;
    var coste17=document.getElementById("coste17").value;
    var coste18=document.getElementById("coste18").value;
    var coste19=document.getElementById("coste19").value;
    var coste20=document.getElementById("coste20").value;
    var coste21=document.getElementById("coste21").value;
    var coste22=document.getElementById("coste22").value;
    var coste23=document.getElementById("coste23").value;
    var coste24=document.getElementById("coste24").value;
    var coste25=document.getElementById("coste25").value;
    var coste26=document.getElementById("coste26").value;
    var coste27=document.getElementById("coste27").value;
    var coste28=document.getElementById("coste28").value;
    var coste29=document.getElementById("coste29").value;
    var coste30=document.getElementById("coste30").value;
    var coste31=document.getElementById("coste31").value;
    var coste32=document.getElementById("coste32").value;
    var coste33=document.getElementById("coste33").value;
    var coste34=document.getElementById("coste34").value;
    var coste35=document.getElementById("coste35").value;
    var coste36=document.getElementById("coste36").value;
    var coste37=document.getElementById("coste37").value;
    var coste38=document.getElementById("coste38").value;
    var coste39=document.getElementById("coste39").value;
    var coste40=document.getElementById("coste40").value;
    var coste41=document.getElementById("coste41").value;
    var coste42=document.getElementById("coste42").value;
    var coste43=document.getElementById("coste43").value;
    var coste44=document.getElementById("coste44").value;
    var coste45=document.getElementById("coste45").value;
    var coste46=document.getElementById("coste46").value;
    var coste47=document.getElementById("coste47").value;
    var coste48=document.getElementById("coste48").value;
    var coste49=document.getElementById("coste49").value;
    var puntosF=document.getElementById("puntosF").value;
    
    var hs1 =document.getElementById("hs1").value;
    var hs2 =document.getElementById("hs2").value;
    var hs3 =document.getElementById("hs3").value;
    var hs4 =document.getElementById("hs4").value;
    var hs5 =document.getElementById("hs5").value;
    var hs6 =document.getElementById("hs6").value;
    var hs7 =document.getElementById("hs7").value;
    var hs8 =document.getElementById("hs8").value;
    var hs9 =document.getElementById("hs9").value;
    var hs10=document.getElementById("hs10").value;
    var hs11=document.getElementById("hs11").value;
    var hs12=document.getElementById("hs12").value;
    var hs13=document.getElementById("hs13").value;
    var hs14=document.getElementById("hs14").value;
    var hs15=document.getElementById("hs15").value;
    var hs16=document.getElementById("hs16").value;
    var hs17=document.getElementById("hs17").value;
    var hs18=document.getElementById("hs18").value;
    var hs19=document.getElementById("hs19").value;
    var hs20=document.getElementById("hs20").value;
    var hs21=document.getElementById("hs21").value;
    var hs22=document.getElementById("hs22").value;
    var hs23=document.getElementById("hs23").value;
    var hs24=document.getElementById("hs24").value;
    var hs25=document.getElementById("hs25").value;
    var hs26=document.getElementById("hs26").value;
    var hs27=document.getElementById("hs27").value;
    var hs28=document.getElementById("hs28").value;
    var hs29=document.getElementById("hs29").value;
    var hs30=document.getElementById("hs30").value;
    var hs31=document.getElementById("hs31").value;
    var hs32=document.getElementById("hs32").value;
    var hs33=document.getElementById("hs33").value;
    var hs34=document.getElementById("hs34").value;
    var hs35=document.getElementById("hs35").value;
    var hs36=document.getElementById("hs36").value;
    var hs37=document.getElementById("hs37").value;
    var hs38=document.getElementById("hs38").value;
    var hs39=document.getElementById("hs39").value;
    var hs40=document.getElementById("hs40").value;
    var hs41=document.getElementById("hs41").value;
    var hs42=document.getElementById("hs42").value;
    var hs43=document.getElementById("hs43").value;
    var hs44=document.getElementById("hs44").value;
    var hs45=document.getElementById("hs45").value;
    var hs46=document.getElementById("hs46").value;
    var hs47=document.getElementById("hs47").value;
    var hs48=document.getElementById("hs48").value;
    var hs49=document.getElementById("hs49").value;
    
    var suma=hs1*coste1+hs2*coste2+hs3*coste3+hs4*coste4+hs5*coste5+hs6*coste6+hs7*coste7+hs8*coste8+hs9*coste9+hs10*coste10+hs11*coste11+hs12*coste12+hs13*coste13+hs14*coste14+hs15*coste15+hs16*coste16+hs17*coste17+hs18*coste18+hs19*coste19+hs20*coste20+hs21*coste21+hs22*coste22+hs23*coste23+hs24*coste24+hs25*coste25+hs26*coste26+hs27*coste27+hs28*coste28+hs29*coste29+hs30*coste30+hs31*coste31+hs32*coste32+hs33*coste33+hs34*coste34+hs35*coste35+hs36*coste36+hs37*coste37+hs38*coste38+hs39*coste39+hs40*coste40+hs41*coste41+hs42*coste42+hs43*coste43+hs44*coste44+hs45*coste45+hs46*coste46+hs47*coste47+hs48*coste48+hs49*coste49;
    //alert(suma);
      if(suma>puntosF){
        alert("Error, la suma de todos los campos tiene que ser menor o igual que "+puntosF);
        document.getElementById("submit").disabled = true;
    }else{
        document.getElementById("submit").disabled = false;
    }
}
</script>