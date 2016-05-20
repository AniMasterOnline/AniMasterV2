<?php
$id_personaje=$_GET['id'];
require_once '../../Public/dompdf/autoload.inc.php';

require_once "../../System/Classes/Partida.php";
require_once "../../System/Classes/Personaje.php";
$Partida = new Partida(); 
$Personaje = new Personaje(); 

$return = $Personaje->viewPersonaje($id_personaje);
$array2 = $Partida->viewPartida($return['id_partida']);
$array2->getNombre();
require_once "../../System/Classes/Usuario.php";
require_once "../../System/Classes/Categoria.php";
require_once "../../System/Classes/Nivel.php";

$categoria = new Categoria(); 
$arrayC = $categoria->viewCar($return['id_categoria']);

$nivel = new Nivel(); 
$arrayN = $nivel->viewNivel($return['nivel']);
$gavi='<html><body>'
        . '<div class=header>'
        . '<center><h1 class=logo>Animaster online V2</h1></center></div>
<div class=header1><b>'.$array2->getNombre()."</b> ".$return['nombre'].'</div>'
        . '<div><table class=header2>'
        . '<tr>'
        . '<td width=200 align=center>Categoria</td>'
        . '<td width=70 align=center>Nivel</td>'
        . '<td width=130 align=center>Raza</td>'
        . '<td width=130 align=center>P. Desorollo</td>'
        . '<td width=130 align=center>PD Restantes</td>'
        . '<td width=130 align=center>Apariencia</td>'
        . '</tr></table>'
        . '<table class=header3><tr>'
        . '<td width=200 align=center>'.$arrayC->getNombre().'</td>'
        . '<td width=70 align=center>'.$return['nivel'].'</td>'
        . '<td width=130 align=center>'.$return['raza'].'</td>'
        . '<td width=130 align=center>'.$arrayN->getPuntos().'</td>'
        . '<td width=130 align=center>'.$return['puntos_totales'].'</td>'
        . '<td width=130 align=center>'.$return['apariencia'].'</td>'
        . '</tr>'
        . '</table></div>'
        . '<div><table class=header2>'
        . '<tr>'
        . '<td width=130 align=center>Tamaño</td>'
        . '<td width=70 align=center>Edad</td>'
        . '<td width=100 align=center>Sexo</td>'
        . '<td width=130 align=center>Pelo</td>'
        . '<td width=130 align=center>Ojos</td>'
        . '<td width=70 align=center>Altura</td>'
        . '<td width=70 align=center>Peso</td>'
        . '</tr></table>'
        . '<table class=header3><tr>'
        . '<td width=130 align=center>'.$return['tamanyo'].'</td>'
        . '<td width=70 align=center>'.$return['edad'].'</td>'
        . '<td width=100 align=center>'.$return['sexo'].'</td>'
        . '<td width=130 align=center>'.$return['pelo'].'</td>'
        . '<td width=130 align=center>'.$return['ojos'].'</td>'
        . '<td width=70 align=center>'.$return['altura'].'</td>'
        . '<td width=70 align=center>'.$return['peso'].'</td>'
        . '</tr>'
        . '</table></div>'
        . '<table class=header2><tr>'
        . '<td width=70 align=center>AGI</td>'
        . '<td width=70 align=center>CON</td>'
        . '<td width=70 align=center>DES</td>'
        . '<td width=70 align=center>FUE</td>'
        . '<td width=70 align=center>INT</td>'
        . '<td width=70 align=center>PER</td>'
        . '<td width=70 align=center>POD</td>'
        . '<td width=70 align=center>VOL</td>'
        . '</tr></table>'
        . '<table class=header3><tr>'
        . '<td width=70 align=center>'.$return['c_AGI'].'</td>'
        . '<td width=70 align=center>'.$return['c_CON'].'</td>'
        . '<td width=70 align=center>'.$return['c_DES'].'</td>'
        . '<td width=70 align=center>'.$return['c_FUE'].'</td>'
        . '<td width=70 align=center>'.$return['c_INT'].'</td>'
        . '<td width=70 align=center>'.$return['c_PER'].'</td>'
        . '<td width=70 align=center>'.$return['c_POD'].'</td>'
        . '<td width=70 align=center>'.$return['c_VOL'].'</td>'
        . '</tr>'
        . '</table></div>';
    $gavi  .= '<div class=hp>Habilidades Primarias</div>'
        . '<table class=header2><tr>'
        . '<td width=120 align=center>Habilidad</td>'
        . '<td width=70 align=center>Base</td>'
        . '<td width=70 align=center>Car</td>'
        . '<td width=70 align=center>Bono</td>'
        . '<td width=70 align=center>Esp</td>'
        . '<td width=70 align=center>Cat</td>'
        . '<td width=70 align=center>Final</td>'
        . '</tr></table>';
    
require_once "../../System/Classes/Personaje.php";
require_once "../../System/Classes/Habilidades_Primarias.php";
require_once "../../System/Classes/Caracteristicas_P.php";
require_once "../../System/Classes/Categoria_HP.php";

$Personaje = new Personaje(); 
$return = $Personaje->viewPersonaje($id_personaje);

$HP = new Habilidades_Primarias(); 
$Caract_p = new Caracteristicas_p(); 
$Categoria_HP = new Categoria_HP(); 

/*Mostrem totes les hp del personaje, en noms, base, caracteristica, bono, especial, categoria, final*/
if (!empty($return)) {
        $contador = 0;
        while ($contador < 4){
            $contador++;
            $arrayHP = $HP->viewHP($contador);
            switch ($contador) {
                case 1:
                    $hp = $return['ha'];
                    break;
                case 2:
                    $hp = $return['hp'];
                    break;
                case 3:
                    $hp = $return['he'];
                    break;
                case 4:
                    $hp = $return['la'];
                    break;
            }
            if( $contador < 3) {
                $arrayCaract_p = $Caract_p->viewCaracteristica($return['c_DES']);
            }elseif ($contador == 3) {
                $arrayCaract_p = $Caract_p->viewCaracteristica($return['c_AGI']);
            }elseif ($contador == 4) {
                $arrayCaract_p = $Caract_p->viewCaracteristica($return['c_FUE']);
            }
            $arrayCategoria_HP = $Categoria_HP->viewHP1($return['id_categoria'], $contador);
            $bonoCategoria = ((int)$arrayCategoria_HP['incr_nv']*(int)$return['nivel']);

            $coste = $arrayCategoria_HP['coste'];
            $hp = $hp / $coste;

            $HAfinal = (int)$hp + (int)$arrayCaract_p + (int)$bonoCategoria;
            $is0 = false;
            if($hp < 0){
                $is0 = true;
            }
            if(!$is0){
                $gavi.= '<table class=header3><tr>
                <td width=120 align=center>'.$arrayHP->getNombre().'</td>
                <td width=70 align=center>'.$hp.'</td>
                <td width=70 align=center>'.$arrayHP->getCaracteristica().'</td>
                <td width=70 align=center>'.$arrayCaract_p.'</td>
                <td width=70 align=center>0</td>
                <td width=70 align=center>'.$bonoCategoria.'</td>
                <td width=70 align=center>'.$HAfinal.'</td></tr></table>';
            }else{
                $gavi.= '<table class=header3><tr>
                <td width=200 align=center>'.$arrayHP->getNombre().'</td>
                <td width=70 align=center>'.$hp.'</td>
                <td width=70 align=center>'.$arrayHP->getCaracteristica().'</td>
                <td width=70 align=center>'.$arrayCaract_p.'</td>
                <td width=70 align=center>0</td>
                <td width=70 align=center>'.$bonoCategoria.'</td>
                <td width=70 align=center>'.$HAfinal.'</td></tr></table>';
            }
        }
}
$gavi.='<div class=hs>Habilidades Secundaria</div>';
$gavi.='<table class=header2><tr width=50%>
	<td width=200 align=center>Nombre</td>
	<td width=70 align=center>Base</td>
	<td width=70 align=center>Caract</td>
	<td width=70 align=center>Bono</td>
	<td width=70 align=center>Esp</td>
	<td width=70 align=center>Cat</td>
	<td width=70 align=left>Final</td>
</tr></table>';

require_once "../../System/Classes/Personaje.php";
require_once "../../System/Classes/Personaje_HS.php";
require_once "../../System/Classes/Habilidades_Secundarias.php";
require_once "../../System/Classes/Caracteristicas_P.php";
require_once "../../System/Classes/Categoria_HS.php";

$return = $Personaje->viewPersonaje($id_personaje);
/*Mostrem totes les hs del personaje, en noms, base, caracteristica, bono, especial, categoria, final*/
$personaje_hs = new Personaje_HS();
$personaje_hs = $personaje_hs->viewPersonaje_HS($id_personaje);
foreach ($personaje_hs as $row){
	$hs_value = $row->getValor(); // valor de la hs
	$hs_id = $row->getId_HS();  // id de la hs

	$HS = new Habilidades_Secundarias();
	$HS = $HS->view_HS($hs_id);

	$hs_name = $HS->getNombre(); // Nombre de la hs
	$hs_car = $HS->getCaracteristica(); // Nombre de la caracteristica AGI ... etc

	$hs_base = $return['c_'.$hs_car]; // Base de la caracteristica del pj

	$Caract_p = new Caracteristicas_p();
	$hs_bono = $Caract_p->viewCaracteristica($hs_base);

	$Categoria_HS = new Categoria_HS();
	$arrayCat_HS = $Categoria_HS->viewHS1($return['id_categoria'], $hs_id);
	$hs_incrlv = (int)$arrayCat_HS['incr_nv']; // incremento categoria
	if($hs_incrlv == null){
		$hs_incrlv = 0; 
	}
	$hs_catfin = $hs_incrlv * $return['nivel']; // incremento categoria * level

	$hs_final = $hs_value + $hs_bono + $hs_catfin;
	$is0 = false;
	if($hs_value == 0){
		$hs_final = 0;
		$is0 = true;
	}
	
	if(!$is0){
		$gavi.='<table class=header3><tr>
				<td width=200 align=center>'.$hs_name.'</td>
				<td width=70 align=center>'.$hs_value.'</td>
				<td width=70 align=center>'.$hs_car.'</td>
				<td width=70 align=center>'.$hs_bono.'</td>
				<td width=70 align=center>0</td>
				<td width=70 align=center>'.$hs_catfin.'</td>
				<td width=70 align=center">'.$hs_final.'</td>
			</tr></table>';
	}else{
		$gavi.= '<table class=header3><tr>
				<td width=200 align=center>'.$hs_name.'</td>
				<td width=70 align=center>'.$hs_value.'</td>
				<td width=70 align=center>'.$hs_car.'</td>
				<td width=70 align=center>'.$hs_bono.'</td>
				<td width=70 align=center>0</td>
				<td width=70 align=center>'.$hs_catfin.'</td>
				<td width=70 align=left>'.$hs_final.'</td>
			</tr></table>';
	}
}
$gavi.='<div class=table5><h1>Inventario</h1></div>';
$gavi.='<table class=table5-1><tr>'
        . '<th>Nombre</th>
            <th>Tipo</th>
            <th>Peso</th>
            <th>Valor</th>
            <th>Cantidad</th>
            <th>Daño</th>
            <th>TA</th>'
        . '</tr></table>';
require_once "../../System/Classes/Personaje_Objeto.php";
require_once "../../System/Classes/Objeto.php";
require_once "../../System/Classes/Tipo.php";
require_once "../../System/Classes/Objeto_Caracteristica.php";

$Personaje_Objeto = new Personaje_Objeto();
$Personaje_Objeto = $Personaje_Objeto->viewObjPerson($id_personaje);
if($Personaje_Objeto != null){
    /*Agafem totes les id_objeto que te el pj mitjançant id_personaje*/
     foreach ($Personaje_Objeto as $row){
         //per cada id_objeto select a objeto where id_objeto = id_objeto;
         $id_objeto = $row->getId_Objeto();
         $cantidad = $row->getCantidad();    //cantidad del objeto

         //mostrem el nom, pes, valor, id_tipus, id_objeto_caracteristica=1(danyo), (TA).
         $objeto = new Objeto();
         $objeto = $objeto->viewObj($id_objeto);     //select * del objeto

         $nombre_objeto = $objeto[0]->getNombre();  //nombre del objeto
         $peso = $objeto[0]->getPeso(); //peso del objeto
         $precio = $objeto[0]->getPrecio(); //precio del objeto
         $id_tipo = $objeto[0]->getId_Tipo();

         $tipo = new Tipo();
         $tipo = $tipo->view_nombre($id_tipo);
         $nombre_tipo = $tipo->getNombre(); //nombre del tipo de objeto (Arma)


         if($id_tipo == '2' || $id_tipo == '3') {
             $Caracteristicas_Objeto = new Objeto_Caracteristica();

             $Caracteristicas_Objeto_Arma = $Caracteristicas_Objeto->selectArmaValor($id_objeto); 
             $danyo = $Caracteristicas_Objeto_Arma->getValor(); //select de danyo

             $Caracteristicas_Objeto_Armadura = $Caracteristicas_Objeto->selectArmaduraValor($id_objeto);
             $TA = $Caracteristicas_Objeto_Armadura->getValor(); //select de TA
         }else{
             $danyo = 0;
             $TA = 0;
         }


         if(empty($TA)){
             $TA = 0;
         }else if(empty($danyo)){
             $danyo = 0;
         }
if($cantidad==""){
    $cantidad=0;
}
         $gavi.= '<table class=table5-2>  <tr>
                 <td width=160 align=center>'.$nombre_objeto.'</td>
                 <td width=110 align=center>'.$nombre_tipo.'</td>
                 <td width=55 align=center>'.$peso.'</td>
                 <td width=155 align=center>'.$precio.'</td>
                 <td width=150 align=center>'.$cantidad.'</td>
                 <td width=145 align=center>'.$danyo.'</td>
                 <td width=25 align=center>'.$TA.'</td>
             </tr></table>';
     } 
 }else{
     $gavi.= '  <table class=table5-2><tr>
                 <td> ??? </td>
                 <td> ??? </td>
                 <td> ??? </td>
                 <td> ??? </td>
                 <td> ??? </td>
                 <td> ??? </td>
                 <td> ??? </td>
             </tr></table>';
 }
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($gavi);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Personaje", array("Attachment" => false));
?>
