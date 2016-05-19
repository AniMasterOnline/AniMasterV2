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

                            $return = $Personaje->viewPersonaje($id_personaje);
                            $array2 = $Partida->viewPartida($return['id_partida']);
                            echo $array2->getNombre();
                        ?>
                        <small class="c-white p-l-5">
                            <?php 
                                $Personaje = new Personaje(); 
                                
                                $return = $Personaje->viewPersonaje($id_personaje);
                                echo $return['nombre'];
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
                                <th class='text-center'>Categoria</th>
                                <th class='text-center'>Nivel</th>
                                <th class='text-center'>Raza</th>
                                <th class='text-center'>P.Desarrollo</th>
                                <th class='text-center'>P.D Restantes</th>
                                <th class='text-center'>Apariencia</th>
                                <th class='text-center'>Tamaño</th>
                                <th class='text-center'>Edad</th>
                                <th class='text-center'>Sexo</th>
                                <th class='text-center'>Pelo</th>
                                <th class='text-center'>Ojos</th>
                                <th class='text-center'>Altura</th>
                                <th class='text-center'>Peso</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../../System/Classes/Personaje.php";
                            require_once "../../System/Classes/Usuario.php";
                            require_once "../../System/Classes/Categoria.php";
                            require_once "../../System/Classes/Nivel.php";
                            
                            $Personaje = new Personaje(); 
                            $return = $Personaje->viewPersonaje($id_personaje);
                            
                            /*Mostrem tots els camps del personaje*/
                            if (!empty($return)) {
                                echo "<tr> ";
                                $categoria = new Categoria(); 
                                $arrayC = $categoria->viewCar($return['id_categoria']);
                                echo "
                                    <th class='text-center f-400'>".$arrayC->getNombre()."
                                    <th class='text-center f-400'>".$return['nivel']."</th>
                                    <th class='text-center f-400'>".$return['raza']."</th>";
                                $nivel = new Nivel(); 
                                $arrayN = $nivel->viewNivel($return['nivel']);
                                echo "
                                    <th class='text-center f-400'>".$arrayN->getPuntos()."</th>
                                    <th class='text-center f-400'>".$return['puntos_totales']."</th>
                                    <th class='text-center f-400'>".$return['apariencia']."</th>
                                    <th class='text-center f-400'>".$return['tamanyo']."</th>
                                    <th class='text-center f-400'>".$return['edad']."</th>
                                    <th class='text-center f-400'>".$return['sexo']."</th>
                                    <th class='text-center f-400'>".$return['pelo']."</th>
                                    <th class='text-center f-400'>".$return['ojos']."</th>
                                    <th class='text-center f-400'>".$return['altura']."</th>
                                    <th class='text-center f-400'>".$return['peso']."</th>
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
                            $return = $Personaje->viewPersonaje($id_personaje);
                            
                            /*Mostrem totes les caracteristiques del personaje*/
                            if (!empty($return)) {
                                echo "<tr> 
                                    <th class='text-center f-400'>".$return['c_AGI']."</th>
                                    <th class='text-center f-400'>".$return['c_CON']."</th>
                                    <th class='text-center f-400'>".$return['c_DES']."</th>
                                    <th class='text-center f-400'>".$return['c_FUE']."</th>
                                    <th class='text-center f-400'>".$return['c_INT']."</th>
                                    <th class='text-center f-400'>".$return['c_PER']."</th>
                                    <th class='text-center f-400'>".$return['c_POD']."</th>
                                    <th class='text-center f-400'>".$return['c_VOL']."</th>
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
                                        $HAfinal = (int)$hp + (int)$arrayCaract_p + (int)$bonoCategoria;
                                        $is0 = false;
                                        if($hp == 0){
                                            $HAfinal = 0;
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
                                    echo '  <tr>
                                            <th class="f-400">'.$hs_name.'</th>
                                            <th class="f-400">'.$hs_value.'</th>
                                            <th class="f-400">'.$hs_car.'</th>
                                            <th class="f-400">'.$hs_bono.'</th>
                                            <th class="f-400">0</th>
                                            <th class="f-400">'.$hs_catfin.'</th>
                                            <th class="f-700 c-green">'.$hs_final.'</th>
                                        </tr>';
                                }else{
                                    echo '  <tr>
                                            <th class="f-400">'.$hs_name.'</th>
                                            <th class="f-400">'.$hs_value.'</th>
                                            <th class="f-400">'.$hs_car.'</th>
                                            <th class="f-400">'.$hs_bono.'</th>
                                            <th class="f-400">0</th>
                                            <th class="f-400">'.$hs_catfin.'</th>
                                            <th class="f-700 c-red">'.$hs_final.'</th>
                                        </tr>';
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
                                <th>Daño</th>
                                <th>TA</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
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

                                     echo '  <tr>
                                             <th class="f-400">'.$nombre_objeto.'</th>
                                             <th class="f-400">'.$nombre_tipo.'</th>
                                             <th class="f-400">'.$peso.'</th>
                                             <th class="f-400">'.$precio.'</th>
                                             <th class="f-400">'.$cantidad.'</th>
                                             <th class="f-400">'.$danyo.'</th>
                                             <th class="f-400">'.$TA.'</th>
                                         </tr>';
                                 } 
                             }else{
                                 echo '  <tr>
                                             <th class="f-400"> ??? </th>
                                             <th class="f-400"> ??? </th>
                                             <th class="f-400"> ??? </th>
                                             <th class="f-400"> ??? </th>
                                             <th class="f-400"> ??? </th>
                                             <th class="f-400"> ??? </th>
                                             <th class="f-400"> ??? </th>
                                         </tr>';
                             }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include "../../Public/layouts/footer.php";?> 
