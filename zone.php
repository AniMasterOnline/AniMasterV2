<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php#Zona roleo';
include "Public/layouts/head.php";?>

<script>
    $(document).ready(function(){

    });
</script>
<!-- Body box -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bgm-deeppurple">
                    <h2>Jugador <small>Diviertete interpretando a tu propio personaje</small></h2>
                </div>
                <div class="card-body card-padding">
                    <div class="row">
                        <?php
                            require_once "System/Classes/Partida_Usuari.php";
                            require_once "System/Classes/Partida.php";
                            $partida_usuari = new Partida_Usuari();
                            $partida_usuari = $partida_usuari->viewUser($value['id_usuario']);
                            if ($partida_usuari != null){
                                $i = 0;
                                foreach ($partida_usuari as $row){
                                    $id_partida = $row->getId_Partida();
                                    $id_usuario = $row->getId_Usuario();
                                    $pos = $row->getPos();

                                    $partida= new Partida();

                                    $partida= $partida->viewPartida($id_partida);
                                    $nombre = $partida->getNombre();
                                    $imagen = $partida->getImagen();
                                    $descripcion = $partida->getDescripcion();
                                    $anyo = $partida->getAnyo();
                                    $nv_sobrenatural = $partida->getNv_Sobrenatural();
                                    $limite = $partida->getLimite();
                                    $token = $partida->getToken();

                                    echo '  <div class="col-sm-6 col-md-4">
                                                <div class="image-box style-2 m-b-20 bordered dark-bg z-depth-2-bottom">
                                                    <div class="overlay-container overlay-visible output" style="background-image: url(Public/img/partida/'.$imagen.');">
                                                        <img class="partidaimg" src="" alt="">
                                                        <a href="#" class="overlay-link iwave"></a>
                                                    </div>
                                                    <div class="body">
                                                        <h3 style="margin-top: 0;">'.$nombre.'</h3>
                                                        <p class="small mb-10"><i class="fa fa-calendar-o" aria-hidden="true">&nbsp;</i>'.$anyo.'<i class="fa fa-star p-l-10" aria-hidden="true">&nbsp;</i>'.$nv_sobrenatural.'<i class="fa fa-user-plus p-l-10" aria-hidden="true">&nbsp;</i>'.$limite.'<i class="fa fa-tag p-l-10" aria-hidden="true">&nbsp;</i>Partida - '.$pos.'</p>
                                                        <p class="text-muted">'.$descripcion.'</p>
                                                        <a href="settings/table/mesa.php?id='.$id_partida.'" class="btn bgm-purple btn-gray-transparent btn-sm margin-clear f-700" style="width: 100%;">Jugar<i class="zmdi zmdi-mail-send pl-10"></i></a>
                                                    </div>
                                                </div>
                                            </div>';

                                    if($i < 2 ){
                                        $i++;
                                    }else if($i == 2){
                                        $i = 0;
                                        echo '<div class="clearfix"></div>';
                                    }

                                }
                            }else{
                                echo 'Aun no tienes partidas!';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <nav class=" col-md-12 navbar navbar-default bgm-brown z-depth-2 b-0 hidden">
            <div class="container" style="text-align: center;">
                <ul class="pagination" >
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

