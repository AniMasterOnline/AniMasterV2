<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    //var_dump($value);
}

if(isset($_GET['token']) && !empty($_GET['token'])){
    require_once('../../System/Classes/Partida.php');
    require_once('../../System/Classes/Partida_Usuari.php');
    $token = $_GET['token'];
    $partida = new Partida();
    $id_partida = $partida->returnId_Partida($token);
    if($id_partida != null){
        $partida= $partida->viewPartida($id_partida);
        $limite = $partida->getLimite();
        $users = $partida_usuari->countUsers($id_partida);
        if ($users < $limite){
            $partida_usuari = new Partida_Usuari($value['id_usuario'],$id_partida, -1,'true');
            $partida_usuari->add();
            echo '<META http-equiv="refresh" content="0;URL=../../zone.php">'; 
            exit;
        }else{
            include '../404/404.php';
        }
    }else{
        include '../404/404.php';
    }
}else{
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id_partida = $_GET['id'];
        
        require_once "../../System/Classes/Partida.php";
        $partida= new Partida();  
        $partida= $partida->viewPartida($id_partida);
        if(empty($partida) || $partida->getId_Usuario()!== $value['id_usuario'] ){
            include '../404/404.php';
        }
        $nombre = $partida->getNombre();
        $imagen = $partida->getImagen();
        $descripcion = $partida->getDescripcion();
        $anyo = $partida->getAnyo();
        $nv_sobrenatural = $partida->getNv_Sobrenatural();
        $limite = $partida->getLimite();
        $token = $partida->getToken();
    }else{
        include '../404/404.php';
    } 
}

$title='Panel de la partida';
$migas='#Home|../../index.php#Mesa|../../settings/table/#'.$nombre.'|view_partida.php?id='.$id_partida.'#Invitar Jugadores';
include "../../Public/layouts/head.php";
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
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a <?php echo 'href="../../System/Protocols/Partida_Token.php?id_partida='.$id_partida.'"';?> >Generar Nueva Token</a>
                                </li>
                            </ul>
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
                            var val = $('#usersinvit').find('option[value="'+ make_id +'"]');;
                            var id = val.attr('id');
                            if (/^\s+|\s+$/.test(make_id) || make_id.length === 0){

                            }else{
                                var parametros = {
                                    "id_partida" : <?php echo $id_partida; ?>,
                                    "id_usuario" : id
                                };
                                $.ajax({
                                    data:  parametros,
                                    url:   '../../System/Protocols/Partida_Invite.php',
                                    type:  'post',
                                    beforeSend: function () {
                                    },
                                    success:  function (response) {
                                        console.log(response);
                                        if(response === 'success'){
                                            swal("Invitación enviada!", "Jugador invitado correctamente!", "success");
                                        }else{
                                            swal("Error!", "Lo sentimos ya no puedes enviar mas invitaciónes!", "warning");
                                        }
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
                                            $("<option>").attr("value", option_list[i]['nickname']).attr("id", option_list[i]['id_usuario'])
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

