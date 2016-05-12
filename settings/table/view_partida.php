<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    //var_dump($value);
}

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

$title='Panel de la partida';
$migas='#Home|../../index.php#Mesa|../../settings/table/#'.$nombre.'|view_partida.php?id='.$id_partida;
include "../../Public/layouts/head.php";
?>

<script>
    $title = "test";
    $body = "test body";
    $icon = "favicon.ico";
    //DesktopNotifyshow($title, $body, $icon);
    $(document).ready(function(){
        $('#eliminar').click(function(){
            swal({
                title: "Estas seguro?",
                text: "No podras recuperar esta partida!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Eliminar!",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: "../../System/Protocols/Partida_Del.php",
                    type: "POST",
                    data: {
                        id: <?php echo $id_partida ?>
                    },
                    dataType: "html",
                    success: function (data) {
                        console.log(data);
                        $(location).attr('href', 'index.php');
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "Please try again", "error");
                    }
                });
            });
        });
    });
    
</script>


<!-- Body content box -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-deeppurple z-depth-1-bottom">
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
                                <li>
                                    <a href="#" id="eliminar">Eliminar partida</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding table-responsive p-0">
                    <table class="table b-0">
                        <thead class="bgm-purple b-0 c-white">
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
                <div class="lv-header-alt clearfix m-b-0 bgm-blue z-depth-1-bottom">
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
                        <thead class="bgm-lightblue b-0 c-white">
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
                                    <a <?php echo 'href="invite.php?id='.$id_partida.'"';?>>Invitar Jugador</a>
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
                        <thead class="bgm-lightgreen b-0 c-white">
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
                <div class="lv-header-alt clearfix m-b-0 bgm-pink z-depth-1-bottom">
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
                        <thead class="bgm-red b-0 c-white">
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
                        <thead class="bgm-amber b-0 c-white">
                            <tr>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Valor (MC)</th>
                                <th>Peso (Kg)</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../../System/Classes/Partida_Objeto.php";
                            require_once "../../System/Classes/Objeto.php";
                            require_once "../../System/Classes/Tipo.php";
                            
                            $partida_objeto = new Partida_Objeto();
                            $id_objeto = $partida_objeto->view_Objetos_Partida($id_partida);
                            
                            $tipo = new Tipo();
                            /*Seleccionem la id de partida i busquem els seus objectes propis de partida*/
                            foreach ($id_objeto as $row) {
                                $objeto1 = new Objeto(); 
                                $objeto1 = $objeto1->viewObj($row->getId_Objeto());
                                
                                /*Per a cada objecte mostrem el contingut que volem*/
                                foreach ($objeto1 as $row2) {
                                    echo "<tr >
                                        <td>".strval($row2->getNombre())."</td>";
                                    
                                    /*Per saber el nom del id_tipo hem de fer una select*/
                                    $tipoNombre = $tipo->view_nombre($row2->getId_Tipo());
                                    echo "
                                        <td>".strval($tipoNombre->getNombre())."</td>
                                        <td>".strval($row2->getPrecio())."</td>
                                        <td>".strval($row2->getPeso())."</td>
                                        </tr>";
                                }
                            }
                            
                            
                            $objeto = new Objeto(); 
                            $objeto = $objeto->viewObjetosPublicos();
                            
                            /*Mostrem tots els objectes que siguin public*/
                            foreach ($objeto as $row) {
                                echo "<tr >
                                    <td>".strval($row->getNombre())."</td>";
                                
                                /*Per saber el nom del id_tipo hem de fer una select*/
                                $tipoNombre = $tipo->view_nombre($row->getId_Tipo());
                                echo "
                                    <td>".strval($tipoNombre->getNombre())."</td>
                                    <td>".strval($row->getPrecio())."</td>
                                    <td>".strval($row->getPeso())."</td>
                                    </tr>";
                            }
                            
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
    
    
    
</div>
<?php include "../../Public/layouts/footer.php";?> 
