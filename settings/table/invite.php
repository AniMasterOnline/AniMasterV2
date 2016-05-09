<?php 
$title='Panel de la partida';
$migas='#Home|../../index.php#Mesa|../../settings/table/# Panel de la partida';
include "../../Public/layouts/head.php";?>
<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id_partida = $_GET['id'];
        
        require_once "../../System/Classes/Partida.php";
        $partida= new Partida();  
        $partida= $partida->viewPartida($id_partida);
        if(empty($partida) || $partida->getId_Usuario()!== $value['id_usuario'] ){
            echo '<META http-equiv="refresh" content="0;URL=index.php">';
        }
        $nombre = $partida->getNombre();
        $imagen = $partida->getImagen();
        $descripcion = $partida->getDescripcion();
        $anyo = $partida->getAnyo();
        $nv_sobrenatural = $partida->getNv_Sobrenatural();
        $limite = $partida->getLimite();
        $token = $partida->getToken();
        
    }else{
        echo '<META http-equiv="refresh" content="0;URL=index.php">';
    }
?>


<!-- Body content box -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-blue z-depth-1-bottom">
                    <h2 class="lvh-label  c-white f-18">Invitar por url</h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a data-toggle="tooltip" data-placement="right" title="Comparte con tus amigos tu url de partida">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding bgm-lightblue c-white">
                    <textarea class="form-control input-sm" readonly style="width: 100%; font-size: 13px; border: 0; padding: 10px 8px; resize: none; height: 60px;"><?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?token='.$token; ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-green z-depth-1-bottom">
                    <h2 class="lvh-label  c-white f-18">Buscar Jugadores </h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a data-toggle="tooltip" data-placement="right" title="Busca y invita a tus Jugadores">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding bgm-lightgreen c-white">
                    <div class="input-group m-b-10">
                        <span class="input-group-btn">
                            <button id="123" class="btn btn-default" type="button">Buscar!</button>
                        </span>
                        <input  type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                    </div>
                    <select id="model_select" class="form-control" data-size="5" title="Seleccion un jugador..." tabindex="-98"></select>
                    <script>
                        $( document ).ready(function() {
                            $("#123").click(function() {
                                var make_id = $('#123').val();
                                var cadena = /^\s+|\s+$/;
                                if (!cadena.test(make_id) || make_id.length !== 0){
                                    
                                }else{
                                    var request = $.ajax({
                                        type: 'GET',
                                        url: '../../System/Protocols/Usuari_search.php?user=' + make_id
                                    });
                                    request.done(function(data){
                                        var option_list = data;
                                        console.log(data);
                                        $("#model_select").empty();
                                        for (var i = 0; i < option_list.length; i++) {
                                            $("#model_select").append(
                                                $("<option></option>").attr(
                                                    "value", option_list[i][0]).text(option_list[i][1])
                                            );
                                        }
                                    });
                                }
                                
                            });
                        });
                        
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

