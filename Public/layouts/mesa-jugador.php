<?php
    require_once "../../System/Classes/Personaje.php";
    $personaje = new Personaje();
    $return = $personaje->viewPersonajeUsuario($value['id_usuario'], $id_partida);
    $id_personaje = $return['id_personaje'];

?>
<div class="row">
    <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="active"><a href="#personaje" aria-controls="personaje" role="tab" data-toggle="tab">Personaje</a></li>
        <li role="presentation"><a href="#habilidades" aria-controls="habilidades" role="tab" data-toggle="tab">Habilidades</a></li>
        <li role="presentation"><a href="#combate" aria-controls="combate" role="tab" data-toggle="tab">Combate</a></li>
        <li role="presentation"><a href="#equipo" aria-controls="equipo" role="tab" data-toggle="tab">Equipo</a></li>
        <li role="presentation"><a href="#mapa" aria-controls="mapa" role="tab" data-toggle="tab">Mapa</a></li>        
    </ul>
</div>
<div class="row" >
    <div class="col-md-12 bgm-white z-depth-1-bottom p-l-0 p-r-0" id="mesa-container">
        <!-- Tab panes -->
        <div class="tab-content ">
            <div role="tabpanel" class="tab-pane fade in active p-0" id="personaje">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-0 m-b-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-indigo z-depth-1-bottom">
                                <h2 class="lvh-label c-white f-18">
                                    Ficha del personaje
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
                                                <a <?php echo 'href="../character/mod_personaje.php?id='.$id_personaje.'"';?>>Modificar personaje</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body card-padding table-responsive p-0">
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
                                        $nivel = new Nivel(); 
                                        $arrayN = $nivel->viewNivel($array['nivel']);
                                    }

                                ?>
                                <div class="pmb-block ">
                                    <div class="pmbb-body p-l-0">
                                        <div class="pmbb-view">
                                            <dl class="dl-horizontal">
                                                <dt>Categoria</dt>
                                                <dd><?php echo $arrayC->getNombre();?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Nivel</dt>
                                                <dd><?php echo $array['nivel'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Raza</dt>
                                                <dd><?php echo $array['raza'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>P.Desarrollo</dt>
                                                <dd><?php echo $arrayN->getPuntos();?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>P.D Restantes</dt>
                                                <dd><?php echo $array['puntos_totales'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Apariencia</dt>
                                                <dd><?php echo $array['apariencia'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Tamaño</dt>
                                                <dd><?php echo $array['tamanyo'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Edad</dt>
                                                <dd><?php echo $array['edad'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Sexo</dt>
                                                <dd><?php echo $array['sexo'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Pelo</dt>
                                                <dd><?php echo $array['pelo'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Ojos</dt>
                                                <dd><?php echo $array['ojos'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Altura</dt>
                                                <dd><?php echo $array['altura'];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Peso</dt>
                                                <dd><?php echo $array['peso'];?></dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-0" id="habilidades">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card m-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-deeppurple z-depth-1-bottom">
                                <h2 class="lvh-label c-white f-18">Caracteristicas</h2>
                            </div>
                            <div class="card-body card-padding table-responsive p-0">
                                <table class="table b-0 m-0">
                                    <thead class="bgm-indigo b-0 c-white">
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
                                                <th class='text-center f-400'>".$array['c_AGI']."</th>
                                                <th class='text-center f-400'>".$array['c_CON']."</th>
                                                <th class='text-center f-400'>".$array['c_DES']."</th>
                                                <th class='text-center f-400'>".$array['c_FUE']."</th>
                                                <th class='text-center f-400'>".$array['c_INT']."</th>
                                                <th class='text-center f-400'>".$array['c_PER']."</th>
                                                <th class='text-center f-400'>".$array['c_POD']."</th>
                                                <th class='text-center f-400'>".$array['c_VOL']."</th>
                                                </tr>";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card m-b-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-indigo z-depth-1-bottom">
                                <h2 class="lvh-label  c-white f-18">Habilidades Primarias </h2>
                            </div>
                            <div class="card-body card-padding table-responsive p-0">
                                <table class="table b-0">
                                    <thead class="bgm-blue b-0 c-white">
                                        <tr>
                                            <th>&nbsp;</th>
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
                                                    $HAfinal = (int)$hp + (int)$arrayCaract_p + (int)$bonoCategoria;
                                                    echo "<tr>
                                                        <th class='f-400'>".$arrayHP->getNombre()."</th>
                                                        <th class='f-400'>".$hp."</th>
                                                        <th class='f-400'>".$arrayHP->getCaracteristica()."</th>
                                                        <th class='f-400'>".$arrayCaract_p."</th>
                                                        <th class='f-400'>0</th>
                                                        <th class='f-400'>".$bonoCategoria."</th>
                                                        <th class='f-700'>".$HAfinal."</th></tr>";
                                                }

                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card m-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-indigo z-depth-1-bottom">
                                <h2 class="lvh-label  c-white f-18">Habilidades Secundarias </h2>
                            </div>
                            <div class="card-body card-padding table-responsive p-0 card-body-partida">
                                <table class="table b-0">
                                    <thead class="bgm-blue b-0 c-white">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Base</th>
                                            <th>Caract</th>
                                            <th>Bono</th>
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

                                         
                                        $Categoria_HS = new Categoria_HS(); 
                                        
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
                                            echo '  <tr>
                                                        <th class="f-400">'.$hs_name.'</th>
                                                        <th class="f-400">'.$hs_value.'</th>
                                                        <th class="f-400">'.$hs_car.'</th>
                                                        <th class="f-400">'.$hs_bono.'</th>
                                                        <th class="f-400">'.$hs_catfin.'</th>
                                                        <th class="f-700">'.$hs_final.'</th>
                                                    </tr>';
                                            
                                            
                                        }
                                        
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="combate">
                 <div class="row">
                    <div class="col-md-12">
                        <h1>Combate</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>

                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-0" id="equipo">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card m-0">
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
            </div>
            <div role="tabpanel" class="tab-pane fade p-0" id="mapa">
                <div id='map'></div>
                <div class="alert bgm-dark m-t-0 m-b-0" id="latlong" style="border-radius: 0px;">
                        <p>Latitude: <input class="form-control disabled" type="text" id="latbox" name="lat" value="0"></p>
                        <p>Longitude: <input class="form-control disabled" type="text" id="lngbox" name="lng" value="0"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkkbD7741_-gMF83eHjO5tgzW5kvx8fj8" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        initMap();
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 0, lng: 0},
              zoom: 2,
              streetViewControl: false,
              mapTypeControl: false,
              mapTypeControlOptions: {
                    mapTypeIds: ['anima']
                    //mapTypeIds: ['anima']
              }
            });
            var moonMapType = new google.maps.ImageMapType({
              getTileUrl: function(coord, zoom) {
                                        // Don't load tiles for repeated maps
                                        var tileRange = 1 << zoom;
                                        if ( coord.y < 0 || coord.y >= tileRange || coord.x < 0 || coord.x >= tileRange )
                                                return null;

                                        // Load the tile for the requested coordinate
                                        var file = '../../Public/img/output' + '/tile_' + zoom + '_' + coord.x + '-' +coord.y + '.png';

                                        return file;
              },
              tileSize: new google.maps.Size(256, 256),
              maxZoom: 4,
              minZoom: 2,
              radius: 1738000,
              name: 'anima'
            });
            map.mapTypes.set('anima', moonMapType);
            map.setMapTypeId('anima');
                                // Marcador
                                var marker = new google.maps.Marker({
                                        position: {lat: 0, lng: 0},
                                        draggable: true,
                                        map: 'anima',
                                        title: "Your location"
                                });
                                marker.setMap(map);
                                google.maps.event.addListener(marker, 'dragend', function (event) {
                                        document.getElementById("latbox").value = this.getPosition().lat();
                                        document.getElementById("lngbox").value = this.getPosition().lng();
                                });






        }
        // Normalizes the coords that tiles repeat across the x axis (horizontally)
        // like the standard Google map tiles.
        function getNormalizedCoord(coord, zoom) {
                var y = coord.y;
                var x = coord.x;
                // tile range in one direction range is dependent on zoom level
                // 0 = 1 tile, 1 = 2 tiles, 2 = 4 tiles, 3 = 8 tiles, etc
                var tileRange = 1 << zoom;
                // don't repeat across y-axis (vertically)
                if (y < 0 || y >= tileRange) {
                  return null;
                }
                // repeat across x-axis
                if (x < 0 || x >= tileRange) {
                  x = (x % tileRange + tileRange) % tileRange;
                }
                return {x: x, y: y};
        }
    });
</script>

