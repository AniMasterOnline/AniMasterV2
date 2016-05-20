<?php
$id_personaje=8;
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
    $gavi  .= 'Habilidades Primarias'
        . '<table class=header2><tr>'
        . '<td width=70 align=center>Habilidad</td>'
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
                echo "<tr>
                <th class='f-400'>".$arrayHP->getNombre()."</th>
                <th class='f-400'>".$hp."</th>
                <th class='f-400'>".$arrayHP->getCaracteristica()."</th>
                <th class='f-400'>".$arrayCaract_p."</th>
                <th class='f-400'>0</th>
                <th class='f-400'>".$bonoCategoria."</th>
                <th class='f-700 c-green'>".$HAfinal."</th></tr>";
            }else{
                echo "<tr>
                <th class='f-400'>".$arrayHP->getNombre()."</th>
                <th class='f-400'>".$hp."</th>
                <th class='f-400'>".$arrayHP->getCaracteristica()."</th>
                <th class='f-400'>".$arrayCaract_p."</th>
                <th class='f-400'>0</th>
                <th class='f-400'>".$bonoCategoria."</th>
                <th class='f-700 c-red'>".$HAfinal."</th></tr>";
            }

        }

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
