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
                        <div class="card m-0 m-b-10">
                            <div class="lv-header-alt clearfix m-b-0 bgm-deeppurple z-depth-1-bottom">
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
                                <div class="pmb-block p-t-15">
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
                        <div class="card m-0">
                            <div class="lv-header-alt clearfix m-b-0 bgm-green z-depth-1-bottom">
                                <h2 class="lvh-label c-white f-18">Caracteristicas</h2>
                            </div>
                            <div class="card-body card-padding table-responsive p-0">
                                <table class="table b-0 m-0">
                                    <thead class="bgm-lightgreen b-0 c-white">
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
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="habilidades">
                 <div class="row">
                    <div class="col-md-12">
                        <h1>Habilidades</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>

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
                var tileRange = 100 << zoom;
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

