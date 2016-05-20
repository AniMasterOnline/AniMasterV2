<!-- User Menu -- Header content box -->
<?php 
$title='Mesa';
$migas='#Home|../../index.php#Mesa|../../settings/table/';
include "../../Public/layouts/head.php";?>

<!-- Body content box -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bgm-dark">
                    <h2>Máster <small>Diviértete creando y gestionando tus propias partidas e historias</small></h2>
                </div>
                <div class="card-body card-padding p-t-5">
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
                                    echo '  <a href ="new_partida.php" type="button" class="btn btn-primary bgm-blue b-0 btn-lg btn-block m-b-5">Nueva Partida</a>';
                                }
                                $result = (100 * $cont)/9;
                                echo '  <div class="progress">
                                            <div class="progress-bar bgm-lightblue b-0" role="progressbar" aria-valuenow="70"
                                            aria-valuemin="0" aria-valuemax="100" style="width:'.$result.'%; min-width: 3em;">
                                              '.$cont.' / 9
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>';
                                $i = 0;
                                foreach ($partida_usuari as $row){
                                    $id_partida = $row->getId_Partida();
                                    $id_usuario = $row->getId_Usuario();
                                    $users = $row->countUsers($id_partida);

                                    $partida= new Partida();
                                    $partida= $partida->viewPartida($id_partida);

                                    $nombre = $partida->getNombre();
                                    $imagen = $partida->getImagen();
                                    $descripcion = $partida->getDescripcion();
                                    $anyo = $partida->getAnyo();
                                    $nv_sobrenatural = $partida->getNv_Sobrenatural();
                                    $limite = $partida->getLimite();

                                    echo '  <div class="col-xs-8 col-sm-6 col-md-4 ">
                                                <div class="card">
                                                    <div class="card-header custom-card" style="background-image: url(\'../../Public/img/partida/'.$imagen.'\');">
                                                        <h2 class="c-black f-500 f-18 text-capitalize opacity p-l-10 p-5 z-depth-1">'.$nombre.'<small class="c-black f-400 f-14"><i class="zmdi zmdi-calendar-note p-r-5"></i>'.$anyo.'<i class="zmdi zmdi-ticket-star p-l-10 p-r-5"></i>'.$nv_sobrenatural.'<i class="zmdi zmdi-account-circle p-l-10 p-r-5"></i>'.$users.' / '.$limite.'</small></h2>

                                                        <ul class="actions actions-alt">
                                                            <li class="dropdown">
                                                                <a href="#" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="zmdi zmdi-more-vert"></i>
                                                                </a>

                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li>
                                                                        <a href="invite.php?id='.$id_partida.'">Gestionar Invitaciónes</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="view_partida.php?id='.$id_partida.'">Gestionar Partida</a>
                                                                    </li>
                                                                    
                                                                    <li role="separator" class="divider"></li>
                                                                    <li>
                                                                        <a href="mesa.php?id='.$id_partida.'">Jugar</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body card-padding p-t-15 custom-card-body bgm-dark">
                                                        '.$descripcion.'
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
    </div>
</div>

<?php include "../../Public/layouts/footer.php";?> 

