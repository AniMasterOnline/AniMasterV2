<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    //var_dump($value);
}
if(isset($_GET['id_personaje']) && !empty($_GET['id_personaje'])){
    $id_personaje = $_GET['id_personaje'];
}else{
    include '../404/404.php';
}

$title='Panel del personaje';
$migas='#Home|../../index.php#Zone|../../zone.php#Personaje|view_partida.php?id_personaje='.$id_personaje;
include "../../Public/layouts/head.php";
?>

<script>
    $title = "test";
    $body = "test body";
    $icon = "favicon.ico";
    //DesktopNotifyshow($title, $body, $icon);
    $(document).ready(function(){
        $('#eliminar').click(function(){
            swal({
                title: "Estas seguro?",
                text: "No podras recuperar esta partida!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Eliminar!",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: "../../System/Protocols/Partida_Del.php",
                    type: "POST",
                    data: {
                        id: <?php echo $id_personaje ?>
                    },
                    dataType: "html",
                    success: function (data) {
                        console.log(data);
                        $(location).attr('href', 'index.php');
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "Please try again", "error");
                    }
                });
            });
        });
    });
</script>


<!-- Body content box -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-deeppurple z-depth-1-bottom">
                    <h2 class="lvh-label c-white f-18">
                        <?php 
                            require_once "../../System/Classes/Partida.php";
                            require_once "../../System/Classes/Personaje.php";
                            $Partida = new Partida(); 
                            $Personaje = new Personaje(); 

                            $array = $Personaje->viewPersonaje($id_personaje);
                            $array2 = $Partida->viewPartida($array['id_partida']);
                            echo $array2->getNombre();
                        ?>
                        <small class="c-white p-l-5">
                            <?php 
                                $Personaje = new Personaje(); 
                                
                                $array = $Personaje->viewPersonaje($id_personaje);
                                echo $array['nombre'];
                            ?>
                        </small></h2>
                    <ul class="lv-actions actions">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a <?php echo 'href="mod_personaje.php?id='.$id_personaje.'"';?>>Modificar personaje</a>
                                </li>
                                <li>
                                    <a href="#" id="eliminar">Eliminar personaje</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding table-responsive p-0">
                    <table class="table b-0 m-0">
                        <thead class="bgm-purple b-0 c-white">
                            <tr>
                                <th>Categoria</th>
                                <th>Nivel</th>
                                <th>Raza</th>
                                <th>P.Desarrollo</th>
                                <th>P.D Restantes</th>
                                <th>Apariencia</th>
                                <th>Tamaño</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Pelo</th>
                                <th>Ojos</th>
                                <th>Altura</th>
                                <th>Peso</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../../System/Classes/Personaje.php";
                            require_once "../../System/Classes/Usuario.php";
                            require_once "../../System/Classes/Categoria.php";
                            require_once "../../System/Classes/Nivel.php";
                            
                            $Personaje = new Personaje(); 
                            $array = $Personaje->viewPersonaje($id_personaje);
                            
                            /*Mostrem tots els camps del personaje*/
                            if (!empty($array)) {
                                echo "<tr> ";
                                $categoria = new Categoria(); 
                                $arrayC = $categoria->viewCar($array['id_categoria']);
                                echo "
                                    <th class='text-center'>".$arrayC->getNombre()."
                                    <th class='text-center'>".$array['nivel']."</th>
                                    <th class='text-center'>".$array['raza']."</th>";
                                $nivel = new Nivel(); 
                                $arrayN = $nivel->viewNivel($array['nivel']);
                                echo "
                                    <th class='text-center'>".$arrayN->getPuntos()."</th>
                                    <th class='text-center'>".$array['puntos_totales']."</th>
                                    <th class='text-center'>".$array['apariencia']."</th>
                                    <th class='text-center'>".$array['tamanyo']."</th>
                                    <th class='text-center'>".$array['edad']."</th>
                                    <th class='text-center'>".$array['sexo']."</th>
                                    <th class='text-center'>".$array['pelo']."</th>
                                    <th class='text-center'>".$array['ojos']."</th>
                                    <th class='text-center'>".$array['altura']."</th>
                                    <th class='text-center'>".$array['peso']."</th>
                                    </tr>";
                            }
                            
                            ?>
                        </tbody>
                    </table>
                    <table class="table b-0 m-0">
                        <thead class="bgm-purple b-0 c-white">
                            <tr>
                                <th class="text-center">Agi</th>
                                <th class="text-center">Con</th>
                                <th class="text-center">Des</th>
                                <th class="text-center">Fue</th>
                                <th class="text-center">Int</th>
                                <th class="text-center">Per</th>
                                <th class="text-center">Pod</th>
                                <th class="text-center">Vol</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../../System/Classes/Personaje.php";
                            
                            $Personaje = new Personaje(); 
                            $array = $Personaje->viewPersonaje($id_personaje);
                            
                            /*Mostrem totes les caracteristiques del personaje*/
                            if (!empty($array)) {
                                echo "<tr> 
                                    <th class='text-center'>".$array['c_AGI']."</th>
                                    <th class='text-center'>".$array['c_CON']."</th>
                                    <th class='text-center'>".$array['c_DES']."</th>
                                    <th class='text-center'>".$array['c_FUE']."</th>
                                    <th class='text-center'>".$array['c_INT']."</th>
                                    <th class='text-center'>".$array['c_PER']."</th>
                                    <th class='text-center'>".$array['c_POD']."</th>
                                    <th class='text-center'>".$array['c_VOL']."</th>
                                    </tr>";
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-red z-depth-1-bottom">
                    <h2 class="lvh-label  c-white f-18">Habilidades Primarias </h2>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-deeporange b-0 c-white">
                            <tr>
                                <th>Habilidad</th>
                                <th>Base</th>
                                <th>Car</th>
                                <th>Bono</th>
                                <th>Esp</th>
                                <th>Cat</th>
                                <th>Final</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../../System/Classes/Personaje.php";
                            require_once "../../System/Classes/Habilidades_Primarias.php";
                            require_once "../../System/Classes/Caracteristicas_p.php";
                            require_once "../../System/Classes/Categoria_HP.php";
                            
                            $Personaje = new Personaje(); 
                            $array = $Personaje->viewPersonaje($id_personaje);
                            $HP = new Habilidades_Primarias(); 
                            $Caract_p = new Caracteristicas_p(); 
                            $Categoria_HP = new Categoria_HP(); 
                            
                            /*Mostrem totes les hp del personaje, en noms, base, caracteristica, bono, especial, categoria, final*/
                            if (!empty($array)) {
                                    $contador = 0;
                                    while ($contador < 4){
                                        $contador++;
                                        $arrayHP = $HP->viewHP($contador);
                                        switch ($contador) {
                                            case 1:
                                                $hp = $array['ha'];
                                                break;
                                            case 2:
                                                $hp = $array['hp'];
                                                break;
                                            case 3:
                                                $hp = $array['he'];
                                                break;
                                            case 4:
                                                $hp = $array['la'];
                                                break;
                                        }
                                        if( $contador < 3) {
                                            $arrayCaract_p = $Caract_p->viewCaracteristica($array['c_DES']);
                                        }elseif ($contador == 3) {
                                            $arrayCaract_p = $Caract_p->viewCaracteristica($array['c_AGI']);
                                        }elseif ($contador == 4) {
                                            $arrayCaract_p = $Caract_p->viewCaracteristica($array['c_FUE']);
                                        }
                                        $arrayCategoria_HP = $Categoria_HP->viewHP1($array['id_categoria'], $contador);
                                        $bonoCategoria = ((int)$arrayCategoria_HP['incr_nv']*(int)$array['nivel']);
                                        $HAfinal = (int)$hp + (int)$arrayCaract_p['bono'] + (int)$bonoCategoria;
                                        echo "<tr>
                                            <th class=''>".$arrayHP->getNombre()."</th>
                                            <th class=''>".$hp."</th>
                                            <th class=''>".$arrayHP->getCaracteristica()."</th>
                                            <th class=''>".$arrayCaract_p['bono']."</th>
                                            <th class=''>0</th>
                                            <th class=''>".$bonoCategoria."</th>
                                            <th class=''>".$HAfinal."</th></tr>";
                                    }
                                    
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-green z-depth-1-bottom">
                    <h2 class="lvh-label  c-white f-18">Habilidades Secundarias </h2>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-lightgreen b-0 c-white">
                            <tr>
                                <th>Nombre</th>
                                <th>Base</th>
                                <th>Caract</th>
                                <th>Bono</th>
                                <th>Esp</th>
                                <th>Cat</th>
                                <th>Final</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../../System/Classes/Personaje.php";
                            require_once "../../System/Classes/Habilidades_Secundarias.php";
                            require_once "../../System/Classes/Caracteristicas_p.php";
                            require_once "../../System/Classes/Categoria_HS.php";
                            
                            $Personaje = new Personaje(); 
                            $array = $Personaje->viewPersonaje($id_personaje);
                            $HS = new Habilidades_Secundarias(); 
                            $Caract_p = new Caracteristicas_p(); 
                            $Categoria_HS = new Categoria_HS(); 
                            
                            /*Mostrem totes les hs del personaje, en noms, base, caracteristica, bono, especial, categoria, final*/
                            if (!empty($array)) {
                                    $contador = 0;
                                    while ($contador < 49){
                                        $contador++;
                                        $arrayHP = $HS->view_HS($contador);
                                        $caracteristicaPersonaje = "c_".$arrayHP->getCaracteristica();
                                        //var_dump($caracteristicaPersonaje);
                                        
                                        $arrayCaract_p = $Caract_p->viewCaracteristica($array[$caracteristicaPersonaje]);
                                        //var_dump($arrayCaract_p);
                                        
                                        $return_CatHS = $Categoria_HS->viewHS1($array['id_categoria'], $contador);
                                        if (!empty($return_CatHS['incr_nv'])) {
                                            $bonoCategoria = (0*(int)$array['nivel']);
                                        }else {
                                            $bonoCategoria = ((int)$return_CatHS['incr_nv']*(int)$array['nivel']);
                                        }
                                        $HSfinal = (int)$array['ha'] + (int)$arrayCaract_p['bono'] + (int)$bonoCategoria;
                                        echo "<tr>
                                            <th class=''>".$arrayHP->getNombre()."</th>";
                                        
                                        //intentar automatitzar el bucle passant la id_secundaria de la taula personaje_HS en comptes de $contador
                                        echo "
                                            <th class=''>".$array[$caracteristicaPersonaje]."</th>
                                            <th class=''>".$arrayHP->getCaracteristica()."</th>
                                            <th class=''>".$arrayCaract_p['bono']."</th>
                                            <th class=''>0</th>
                                            <th class=''>".$bonoCategoria."</th>
                                            <th class=''>".$HSfinal."</th></tr>";
                                    }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-blue z-depth-1-bottom">
                    <h2 class="lvh-label c-white f-18">Inventario</h2>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-lightblue b-0 c-white">
                            <tr>
                                <!--Fer una select de Objeto, Personaje?, Personaje_Objeto -->
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Peso</th>
                                <th>Valor</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td class="text-capitalize">Espada Larga</td>
                                <td>Arma</td>
                                <td>1 Kg</td>
                                <td>5000 MC</td>
                                <td>1 unidad</td>
                            </tr>
                            <tr >
                                <td class="text-capitalize">Platas</td>
                                <td>Útiles Varios</td>
                                <td>0</td>
                                <td>10 MC</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include "../../Public/layouts/footer.php";?> 
