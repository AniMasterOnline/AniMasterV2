<!-- Header content box -->
<?php 
$title='Zona roleo';
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
                    <h2>Jugador <small>Diviértete interpretando a tu propio personaje</small></h2>
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
                                    $users = $row->countUsers($id_partida);
                                    
                                    $partida= new Partida();
                                    $partida= $partida->viewPartida($id_partida);
                                    
                                    $nombre = $partida->getNombre();
                                    $imagen = $partida->getImagen();
                                    $descripcion = $partida->getDescripcion();
                                    $anyo = $partida->getAnyo();
                                    $nv_sobrenatural = $partida->getNv_Sobrenatural();
                                    $limite = $partida->getLimite();
                                    echo '  <div class="col-xs-8 col-sm-6 col-md-4">
                                                <div class="card">
                                                    <div class="card-header custom-card" style="background-image: url(\'Public/img/partida/'.$imagen.'\');">
                                                        <h2 class="c-black f-500 f-18 text-capitalize opacity p-l-10 p-5 z-depth-1">'.$nombre.'<small class="c-black f-400 f-14"><i class="zmdi zmdi-calendar-note p-r-5"></i>'.$anyo.'<i class="zmdi zmdi-ticket-star p-l-10 p-r-5"></i>'.$nv_sobrenatural.'<i class="zmdi zmdi-account-circle p-l-10 p-r-5"></i>'.$users.' / '.$limite.'</small></h2>

                                                        <ul class="actions actions-alt">
                                                            <li class="dropdown">
                                                                <a href="#" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="zmdi zmdi-more-vert"></i>
                                                                </a>

                                                                <ul class="dropdown-menu dropdown-menu-right">';
                                                                    require_once "System/Classes/Personaje.php";
                                                                    $personaje = new Personaje();
                                                                    $return=$personaje->viewPersonajeUsuario($value['id_usuario'], $id_partida);
                                                                    if($return !== null){
                                                                        echo '  <li>
                                                                                    <a href="settings/character/index.php?id_partida='.$id_partida.'">Gestionar Personaje</a>
                                                                                </li>
                                                                                <li role="separator" class="divider"></li>
                                                                                <li>
                                                                                    <a href="settings/table/mesa.php?id='.$id_partida.'">Jugar</a>
                                                                                </li>';
                                                                    }else{
                                                                        echo '  <li>
                                                                                    <a href="settings/character/new_personaje1.php?id_partida='.$id_partida.'">Crear Personaje</a>
                                                                                </li>';
                                                                    }         
                                                            echo '</ul>
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
                                echo 'Aun no tienes partidas!';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

