<!-- Header content box -->
<?php 
$title='Partidas de rol';
$migas='#Index|index.php#Partidas de rol';
include "Public/layouts/head.php";?>
<script>
$(document).ready(function(){
    var counter = 0;
    var interval = setInterval(function() {
        counter++;
        console.log(counter);
        // Display 'counter' wherever you want to display it.
        if (counter == 5) {
            // Display a login box
            clearInterval(interval); // stop the interval
        }
    }, 1000);
});
</script>
<!-- Body box -->
<div class="container">
        <?php
            require_once "System/Classes/Partida.php";
            require_once "System/Classes/Partida_Usuari.php";
            $partida= new Partida();
            $partida_usuari= new Partida_Usuari();
            if(isset($_GET['busqueda']) && !empty($_GET['busqueda'])){
                $busqueda=$_GET['busqueda'];
                $result = $partida->buscPartida($busqueda);
                $i = 0;
                foreach($result as $row){
                    $id_partida = $row->getId_Partida();
                    $users = $partida_usuari->countUsers($id_partida);
                    $nombre = $row->getNombre();
                    $master = $row->getId_Usuario();
                    $imagen = $row->getImagen();
                    $descripcion = $row->getDescripcion();
                    $anyo = $row->getAnyo();
                    $nv_sobrenatural = $row->getNv_Sobrenatural();
                    $limite = $row->getLimite();
                    $token = $row->getToken();

                    $partida_usuari= new Partida_Usuari();
                    if(isset($_SESSION['user'])){
                        $invited = $partida_usuari->testInvited($value['id_usuario'], $id_partida);
                    }
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
                                                    if(isset($_SESSION['user'])){
                                                        if($master == $value['id_usuario']){
                                                            echo '  <li>
                                                                        <a href="settings/table/invite.php?id='.$id_partida.'">Gestionar Jugadores</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="settings/table/view_partida.php?id='.$id_partida.'">Gestionar Partida</a>
                                                                    </li>
                                                                    <li role="separator" class="divider"></li>
                                                                    <li>
                                                                        <a href="settings/table/mesa.php?id='.$id_partida.'">Jugar</a>
                                                                    </li>';
                                                        }else if($invited){
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
                                                        }else{
                                                            echo '  <li>
                                                                        <a href="settings/table/invite.php?solid='.$id_partida.'">Solicitar Partida</a>
                                                                    </li>';
                                                        }  
                                                    }else{
                                                        echo '  <li>
                                                                    <a href="login.php">Login</a>
                                                                </li>';
                                                    }
                                            echo '</ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body card-padding p-t-15 custom-card-body">
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
                $partida = $partida->view_all();
                if($partida !== null){
                    $i = 0;
                    foreach($partida as $row){
                        $id_partida = $row->getId_Partida();
                        $users = $partida_usuari->countUsers($id_partida);
                        $nombre = $row->getNombre();
                        $master = $row->getId_Usuario();
                        $imagen = $row->getImagen();
                        $descripcion = $row->getDescripcion();
                        $anyo = $row->getAnyo();
                        $nv_sobrenatural = $row->getNv_Sobrenatural();
                        $limite = $row->getLimite();
                        $token = $row->getToken();
                        
                        $partida_usuari= new Partida_Usuari();
                        if(isset($_SESSION['user'])){
                            $invited = $partida_usuari->testInvited($value['id_usuario'], $id_partida);
                        }
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
                                                    if(isset($_SESSION['user'])){
                                                        if($master == $value['id_usuario']){
                                                            echo '  <li>
                                                                        <a href="settings/table/invite.php?id='.$id_partida.'">Gestionar Jugadores</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="settings/table/view_partida.php?id='.$id_partida.'">Gestionar Partida</a>
                                                                    </li>
                                                                    <li role="separator" class="divider"></li>
                                                                    <li>
                                                                        <a href="settings/table/mesa.php?id='.$id_partida.'">Jugar</a>
                                                                    </li>';
                                                        }else if($invited){
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
                                                        }else{
                                                            echo '  <li>
                                                                        <a href="settings/table/invite.php?solid='.$id_partida.'">Solicitar Partida</a>
                                                                    </li>';
                                                        }  
                                                    }else{
                                                        echo '  <li>
                                                                    <a href="login.php">Login</a>
                                                                </li>';
                                                    }
                                            echo '</ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body card-padding p-t-15 custom-card-body">
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
                }
            }

        ?>
            
</div>
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

