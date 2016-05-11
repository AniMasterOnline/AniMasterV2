<!-- User Menu -- Header content box -->
<?php 
$title='Mesa';
$migas='#Home|../../index.php#Mesa|../../settings/table/';
include "../../Public/layouts/head.php";?>

<!-- Body content box -->
<div class="container">
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <?php
                    require_once "../../System/Classes/Partida_Usuari.php";
                    require_once "../../System/Classes/Partida.php";
                    $partida_usuari = new Partida_Usuari();
                    $partida_usuari = $partida_usuari->viewMaster($value['id_usuario']);
                    $cont = 0;
                    if ($partida_usuari != null){
                        foreach ($partida_usuari as $row){
                            $cont++;
                        }
                        if ($cont >= 0 && $cont < 9){
                            echo '  <a href ="new_partida.php" type="button" class="btn btn-primary btn-lg btn-block m-b-5">Nueva Partida</a>';
                        }
                        $result = (100 * $cont)/9;
                        echo '  <div class="progress">
                                    <div class="progress-bar bgm-brown b-0" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" style="width:'.$result.'%; min-width: 3em;">
                                      '.$cont.' / 9
                                    </div>
                                </div>
                                <div class="clearfix"></div>';
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
                            
                            echo '  <div class="col-md-4">
                                        <div class="image-box style-2 m-b-20 bordered dark-bg z-depth-2-bottom">
                                            <div class="overlay-container overlay-visible output" style="background-image: url(../../Public/img/partida/'.$imagen.');">
                                                <img class="partidaimg" src="" alt="">
                                                <a href="invite.php?id='.$id_partida.'" class="overlay-link iwave"><i class="fa fa-share-alt fa-mesa"></i></a>
                                            </div>
                                            <div class="body">
                                                <h3 style="margin-top: 0;">'.$nombre.'</h3>
                                                <p class="small mb-10"><i class="fa fa-calendar-o" aria-hidden="true">&nbsp;</i>'.$anyo.'<i class="fa fa-star p-l-10" aria-hidden="true">&nbsp;</i>'.$nv_sobrenatural.'<i class="fa fa-user-plus p-l-10" aria-hidden="true">&nbsp;</i>'.$limite.'<i class="fa fa-tag p-l-10" aria-hidden="true">&nbsp;</i>Partida - '.$pos.'</p>
                                                <p class="text-muted">'.$descripcion.'</p>
                                                <a href="view_partida.php?id='.$id_partida.'" class="btn bgm-deeppurple btn-gray-transparent btn-sm margin-clear m-b-5" style="width: 100%;">Gestionar partida<i class="zmdi zmdi-settings pl-10"></i></a>
                                                <a href="../../mesa.php?id='.$id_partida.'" class="btn bgm-purple btn-gray-transparent btn-sm margin-clear f-700" style="width: 100%;">Jugar<i class="zmdi zmdi-mail-send pl-10"></i></a>
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
                        echo '  <a href ="new_partida.php" type="button" class="btn btn-primary btn-lg btn-block m-b-5">Nueva Partida</a>';
                        echo '  <div class="progress">
                                    <div class="progress-bar bgm-brown b-0" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" style="width:0%; min-width: 3em;">
                                      0 / 9
                                    </div>
                                </div>
                                <div class="clearfix"></div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "../../Public/layouts/footer.php";?> 

