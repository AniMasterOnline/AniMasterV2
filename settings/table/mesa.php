<!-- Header content box -->
<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    //var_dump($value);
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once "../../System/Classes/Partida.php";
    require_once "../../System/Classes/Partida_Usuari.php";
    
    $id_partida = $_GET['id'];
    $id_usuario = $value['id_usuario'];
    
    $partida= new Partida();
    $partida= $partida->viewPartida($id_partida);
    
    $partida_usuari= new Partida_Usuari();
    $you_can_not_pass = $partida_usuari->testInvited($id_usuario, $id_partida);
    
    if(empty($partida) || $you_can_not_pass!== true ){
        include '../404/404.php';
    }
    $id_master = $partida->getId_Usuario();
    $nombre = $partida->getNombre();
    $imagen = $partida->getImagen();
    $descripcion = $partida->getDescripcion();
    $anyo = $partida->getAnyo();
    $nv_sobrenatural = $partida->getNv_Sobrenatural();
    $limite = $partida->getLimite();
    $token = $partida->getToken();
    
    $file = '../../System/Logs/'.$id_partida.'-'.$nombre;
    if (!file_exists($file)) {
        fwrite(fopen($file, 'a'), "<div class='chatbox pull-left f-11 text-center system'><span>¡Inicio de la sesion de roleo!</span></div>\n"); 
    }

}else{
    include '../404/404.php';
}
$title='Nom Partida';
$migas='#'.$nombre;
include "../../Public/layouts/head.php";?>


<LINK HREF="../../Public/css/mesa.css" rel="stylesheet">
<script src="../../Public/js/chat.js"></script>
<script>
    // ask user for name with popup prompt    
    var file = '<?php echo $id_partida.'-'.$nombre ?>';
    var name = '><?php echo $value['nickname']; ?>';
    var color = "<?php if($id_master == $value['id_usuario']){ echo 'c-purple'; }else{ echo 'c-black'; } ?>";

    var chat =  new Chat();
    $(function() {
        instanse = false;
        chat.getState(file); 

        $('#sendie-btn').click(function(e) {
            var text = $('#sendie').val();
            $('#sendie').val('');
            chat.send(text, name, color, file);
        });
        $('#sendie-btnimg').click(function(e) {
            console.log('send Image');
            swal({
                title: "Enviar Imagen!",
                text: "url de la imagen:",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                inputPlaceholder: "url"
              }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                  swal.showInputError("Tienes que pegar aqui una url valida!");
                  return false
                }
                chat.sendimg(inputValue, name, color, file);
                swal("Imagen enviada!", "url: " + inputValue, "success");
              });
            
        });
        $('#sendie').keyup(function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if(code == 13) { //Enter keycode
                var text = $('#sendie').val();
                $('#sendie').val('');
                chat.send(text, name, color, file);
            }
        });
    });
    $(window).load(function() {
        chat.loadxat(file);
        setInterval(myFunction(), 2000);

        function myFunction() {
            setInterval(function(){ chat.update(file); }, 1500);
        }
    });
</script>
<!-- Menu Toggle Script -->
<?php
    function rcolor(){
        $color = substr(md5(rand()), 0, 6);
        return 'style="color: #'.$color.';"';
    }
?>

<!-- Body content box -->
<div id="wrapper" >
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="z-depth-1">
            <div class="bgchatimg">&nbsp;</div>
            <div id="chat-top" class="z-depth-1 bgm-white ">
                <ul class="top-menu" id="top-menu-chat">
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="#"><i class="tm-icon zmdi zmdi-more-vert c-black"></i></a>
                        <ul class="dropdown-menu dm-icon pull-right" id="menu-chat-ul">
                            <li id="sendie-btnimg"><a><i class="zmdi zmdi-image-o"></i>Enviar Imagen</a></li>
                            <!-- <li id="sendie-btnvid"><a><i class="zmdi zmdi-slideshow"></i> Enviar Video</a></li> -->
                            <!-- <li role="separator" class="divider"></li> -->
                            
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="chat-container" class="c-overflow">
                
            </div>
            <div id="chat-box" class="z-depth-1-top bgm-gray lv-footer ms-reply p-0 b-0" >
                <textarea id="sendie" placeholder="What's on your mind..."></textarea>
                <button id="sendie-btn" ><i class="zmdi zmdi-mail-send"></i></button>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        
        <!-- Page Content -->
        <div  id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <ul class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active"><a href="#personaje" aria-controls="personaje" role="tab" data-toggle="tab">Personaje</a></li>
                        <li role="presentation"><a href="#habilidades" aria-controls="habilidades" role="tab" data-toggle="tab">Habilidades</a></li>
                        <li role="presentation"><a href="#combate" aria-controls="combate" role="tab" data-toggle="tab">Combate</a></li>
                        <li role="presentation"><a href="#equipo" aria-controls="equipo" role="tab" data-toggle="tab">Equipo</a></li>
                        <li role="presentation" class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Otros <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                                <li role="presentation"><a href="#mapa" aria-controls="mapa" role="tab" data-toggle="tab">Mapa</a></li>
                                <li role="presentation"><a href="#batalla" aria-controls="batalla" role="tab" data-toggle="tab">Batalla</a></li>
                                <li role="presentation"><a href="#diario" aria-controls="diario" role="tab" data-toggle="tab">Diario del Jugador</a></li>
                          </ul>
                        </li>
                    </ul>
                </div>
                <div class="row" >
                    <div class="col-md-12 bgm-white z-depth-1-bottom p-l-0 p-r-0" id="mesa-container">
                        <!-- Tab panes -->
                        <div class="tab-content ">
                            <div role="tabpanel" class="tab-pane fade in active p-l-15 p-r-15" id="personaje">
                                <div class="row">
                                    <div class="col-md-12">
                                            <h1>Personaje <small>Subtext for header</small></h1>
                                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                        
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
                            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="equipo">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <h1>Equipo</h1>
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
                            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="batalla">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <h1>Registro de batalla</h1>
                                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade p-l-15 p-r-15" id="diario">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <h1>Diario del jugador</h1>
                                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&key=AIzaSyBkkbD7741_-gMF83eHjO5tgzW5kvx8fj8" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                initMap();
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                      center: {lat: 0, lng: 0},
                      zoom: 2,
                      streetViewControl: false,
                      mapTypeControl: true,
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
                      maxZoom: 5,
                      minZoom: 1,
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
						title: "Your location",
						optimized: false
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

    </div>
    <!-- /#wrapper -->

<!-- Footer content box -->
<?php include "../../Public/layouts/footer.php";?> 

