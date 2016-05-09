<?php 
$title='Panel de la partida';
$migas='#Home|../../index.php#Mesa|../../settings/table/# Panel de la partida';
include "../../Public/layouts/head.php";?>
<?php
    if(isset($_GET['token']) && !empty($_GET['token'])){
        require_once('../../System/Classes/Partida.php');
        require_once('../../System/Classes/Partida_Usuari.php');
        $token = $_GET['token'];
        $partida = new Partida();
        $id_partida = $partida->returnId_Partida($token);
        $partida_usuari = new Partida_Usuari($value['id_usuario'],$id_partida, -1,'true');
        $partida_usuari->add();
        echo '<META http-equiv="refresh" content="0;URL=../../zone.php">';
        
        
    }else{
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
                            <a data-toggle="tooltip" data-placement="right" title="Comparte sólo con tus amigos tu url de partida">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding bgm-lightblue c-white h-250 vcenter">
                    <div class="w-100 ">
                        <textarea class="form-control input-sm m-b-10" readonly style="width: 100%; font-size: 13px; border: 0; padding: 10px 8px; resize: none; height: 100px;"><?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?token='.$token; ?></textarea>
                    </div>
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
                <div class="card-body card-padding bgm-lightgreen c-white h-250 vcenter">
                    <div class="w-100 ">
                        <input id="123" type="text" class="form-control m-b-10" placeholder="Username" aria-describedby="basic-addon1" list="usersinvit" onkeyup="return forceLower(this);">
                        <button class="btn btn-primary waves-effect bgm-lightblue b-0 w-100" onclick="inviteUser();">Invitar</button>
                        <datalist id="usersinvit" ></datalist>
                    </div>
                    <script>
                        function inviteUser(){
                            var make_id = $('#123').val();
                            if (/^\s+|\s+$/.test(make_id) || make_id.length === 0){

                            }else{
                                var 
                                var parametros = {
                                    "id_partida" : <?php echo $id_partida; ?>,
                                    "user" : make_id
                                };
                                $.ajax({
                                        data:  parametros,
                                        url:   '../../System/Protocols/Partida_Invite.php',
                                        type:  'post',
                                        beforeSend: function () {
                                        },
                                        success:  function (response) {
                                            console.log(response);
                                            swal("Good job!", "You clicked the button!", "success");
                                        }
                                });
                            }
                        }
                        function forceLower(strInput){
                            userslist();
                            strInput.value=strInput.value.toLowerCase();
                        }
                        function userslist() {
                            var make_id = $('#123').val().toLowerCase();
                            $('#123').val(make_id);
                            if (/^\s+|\s+$/.test(make_id) || make_id.length === 0){

                            }else{
                                var request = $.ajax({
                                    type: 'GET',
                                    url: '../../System/Protocols/Usuari_search.php?user=' + make_id
                                });
                                request.done(function(data){
                                    var option_list = $.parseJSON(data);
                                    $("#usersinvit").empty();
                                    for (var i = 0; i < option_list.length; i++) {
                                        $("#usersinvit").append(
                                            $("<option>").attr("value", option_list[i]['nickname']).text(option_list[i]['nickname'])
                                        );
                                    }
                                });
                            }
                        }
                        
                        function ClipBoard(str){
                            holdtext.innerText = str;
                            CopiedInfo = holdtext.createTextRange();
                            CopiedIfo.execCommand("Copy");
                        }
                        
                        $( document ).ready(function() {
                            
                        });
                        
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

