<div class="row">
    <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="active"><a href="#jugadores" aria-controls="jugadores" role="tab" data-toggle="tab">Jugadores</a></li>
        <li role="presentation"><a href="#personajes" aria-controls="personajes" role="tab" data-toggle="tab">Personajes</a></li>
        <li role="presentation"><a href="#objetos" aria-controls="objetos" role="tab" data-toggle="tab">Objetos</a></li>
        <li role="presentation"><a href="#combate" aria-controls="combate" role="tab" data-toggle="tab">Combate</a></li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Otros <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
                <li role="presentation"><a href="#mapa" aria-controls="mapa" role="tab" data-toggle="tab">Mapa</a></li>
                <li role="presentation"><a href="#diario" aria-controls="diario" role="tab" data-toggle="tab">Diario del master</a></li>
                <!--<li role="presentation"><a href="#opc" aria-controls="opc" role="tab" data-toggle="tab">Configuración</a></li> -->
          </ul>
        </li>
    </ul>
</div>
<div class="row" >
    <div class="col-md-12 bgm-white z-depth-1-bottom p-l-0 p-r-0" id="mesa-container">
        <!-- Tab panes -->
        <div class="tab-content ">
            <div role="tabpanel" class="tab-pane fade in active p-l-15 p-r-15" id="jugadores">
                <div class="row">
                    <div class="col-md-12">
                            <h1>Jugadores <small>Subtext for header</small></h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>

                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="personajes">
                 <div class="row">
                    <div class="col-md-12">
                        <h1>Personajes</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>

                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="objetos">
                 <div class="row">
                    <div class="col-md-12">
                        <h1>Objetos</h1>
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
            <div role="tabpanel" class="tab-pane fade p-0" id="mapa">
                <div id='map'></div>
                <div class="alert bgm-dark m-t-0 m-b-0" id="latlong" style="border-radius: 0px;">
                        <p>Latitude: <input class="form-control disabled" type="text" id="latbox" name="lat" value="0"></p>
                        <p>Longitude: <input class="form-control disabled" type="text" id="lngbox" name="lng" value="0"></p>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="diario">
                 <div class="row">
                    <div class="col-md-12">
                        <h1>Diario del master
                            <span class="m-l-15">
                                <button class="btn btn-primary btn-sm hec-button waves-effect btn-xs m-0">Editar!</button>
                                <button class="btn btn-success btn-sm hec-save waves-effect btn-xs m-0" style="display: none;">Guardar</button>
                            </span>
                        </h1>
                        <div class="html-editor-click m-b-10" style="display: block;">
                            <?php
                                if($diario != null){
                                    echo $diario;
                                }else{
                                    echo '<br>';
                                } 
                            ?>
                        </div>
                        <div class="m-b-10">
                            
                        </div>
                        <script>
                            $(document).ready(function() {
                                //Edit
                                $('body').on('click', '.hec-button', function(){
                                    $('.html-editor-click').summernote({
                                        height: 300,
                                        minHeight: null,             // set minimum height of editor
                                        maxHeight: null,
                                        focus: true
                                        
                                    });
                                    $('.hec-save').show();
                                })

                                //Save
                                $('body').on('click', '.hec-save', function(){
                                    $('.html-editor-click').code();
                                    $('.html-editor-click').destroy();
                                    $('.hec-save').hide();
                                    var diario = $('.html-editor-click').html();
                                    $.ajax({
                                        url: "../../System/Protocols/Partida_Diario.php",
                                        type: "POST",
                                        data: {
                                            id: <?php echo $id_partida ?>,
                                            datos: diario
                                        },
                                        dataType: "html",
                                        success: function (data) {
                                            console.log(data);
                                        }
                                    });
                                    $.notify({
                                            // options
                                            message: 'Content Saved Successfully!'
                                    },{
                                            // settings
                                            type: 'inverse',
                                            delay: 4000,
                                            offset : {
                                                    y: 100,
                                                    x: 20
                                            }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="opc">
                 <div class="row">
                    <div class="col-md-12">
                        <h1>Configuración de la partida</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>

                    </div>
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

