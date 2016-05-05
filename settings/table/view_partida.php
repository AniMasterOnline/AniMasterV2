<?php 
$title='Mesa';
$migas='#Home|../../index.php#Mesa|../../settings/table/';
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
        <div class="col-md-12">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-brown z-depth-1-bottom">
                    <h2 class="lvh-label c-white f-18"><?php echo ''.$nombre; ?></h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a href="#">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a <?php echo 'href="mod_partida.php?id='.$id_partida.'"';?>>Configuraciones</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding table-responsive p-0">
                    <table class="table b-0">
                        <thead class="bgm-gray b-0">
                            <tr>
                                <th>Descripcion</th>
                                <th>Año</th>
                                <th>Nv_Sobrenatural</th>
                                <th>Max_Jugadores</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td><?php echo $descripcion; ?></td>
                                <td><?php echo $anyo; ?></td>
                                <td><?php echo $nv_sobrenatural; ?></td>
                                <td><?php echo $limite; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-cyan z-depth-1-bottom">
                    <h2 class="lvh-label c-white f-18">Npc's</h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a data-toggle="tooltip" data-placement="right" title="Crea y gestiona tus propios NPC's">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">Nuevo</a>
                                </li>
                                <li>
                                    <a href="#">Modificar</a>
                                </li>
                                <li>
                                    <a href="#">Eliminar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-gray b-0">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Nivel</th>
                                <th>Categoria</th>
                                <th>exp_actual</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td>1</td>
                                <td>Jacob</td>
                                <td>3</td>
                                <td>Mago</td>
                                <td>350</td>
                            </tr>
                            <tr >
                                <td>2</td>
                                <td>Pau</td>
                                <td>2</td>
                                <td>Ladron</td>
                                <td>280</td>
                            </tr>
                            <tr >
                                <td>3</td>
                                <td>Marc</td>
                                <td>4</td>
                                <td>Guerrero</td>
                                <td>480</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-green z-depth-1-bottom">
                    <h2 class="lvh-label  c-white f-18">Jugadores </h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a data-toggle="tooltip" data-placement="right" title="Invita y gestiona a tus Jugadores">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">Invitar Jugador</a>
                                </li>
                                <li>
                                    <a href="#">Modificar Jugador</a>
                                </li>
                                <li>
                                    <a href="#">Eliminar Jugador</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-gray b-0">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Nivel</th>
                                <th>Categoria</th>
                                <th>exp_actual</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td>1</td>
                                <td>Jacob</td>
                                <td>3</td>
                                <td>Mago</td>
                                <td>350</td>
                            </tr>
                            <tr >
                                <td>2</td>
                                <td>Pau</td>
                                <td>2</td>
                                <td>Ladron</td>
                                <td>280</td>
                            </tr>
                            <tr >
                                <td>3</td>
                                <td>Marc</td>
                                <td>4</td>
                                <td>Guerrero</td>
                                <td>480</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-red z-depth-1-bottom">
                    <h2 class="lvh-label  c-white f-18">Enemigos</h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a data-toggle="tooltip" data-placement="right" title="Crea y gestiona tus propios Enemigos">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">Nuevo</a>
                                </li>
                                <li>
                                    <a href="#">Modificar</a>
                                </li>
                                <li>
                                    <a href="#">Eliminar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-gray b-0">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Nivel</th>
                                <th>Categoria</th>
                                <th>exp_actual</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td>1</td>
                                <td>Jacob</td>
                                <td>3</td>
                                <td>Mago</td>
                                <td>350</td>
                            </tr>
                            <tr >
                                <td>2</td>
                                <td>Pau</td>
                                <td>2</td>
                                <td>Ladron</td>
                                <td>280</td>
                            </tr>
                            <tr >
                                <td>3</td>
                                <td>Marc</td>
                                <td>4</td>
                                <td>Guerrero</td>
                                <td>480</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-orange z-depth-1-bottom">
                    <h2 class="lvh-label  c-white f-18">Objetos</h2>
                    <ul class="lv-actions actions">
                        <li>
                            <a data-toggle="tooltip" data-placement="right" title="Crea y gestiona tus propios Objetos">
                                <i class="zmdi zmdi-info c-white"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">Nuevo</a>
                                </li>
                                <li>
                                    <a href="#">Modificar</a>
                                </li>
                                <li>
                                    <a href="#">Eliminar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-gray b-0">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Nivel</th>
                                <th>Categoria</th>
                                <th>exp_actual</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td>1</td>
                                <td>Jacob</td>
                                <td>3</td>
                                <td>Mago</td>
                                <td>350</td>
                            </tr>
                            <tr >
                                <td>2</td>
                                <td>Pau</td>
                                <td>2</td>
                                <td>Ladron</td>
                                <td>280</td>
                            </tr>
                            <tr >
                                <td>3</td>
                                <td>Marc</td>
                                <td>4</td>
                                <td>Guerrero</td>
                                <td>480</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
    
    
    
</div>
<?php include "../../Public/layouts/footer.php";?> 
