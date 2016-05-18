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
    $master = $partida->getId_Usuario();
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
                                    <a <?php echo 'href="mod_partida.php?id='.$id_partida.'"';?>>Modificar Partida</a>
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
                                    <a <?php echo 'href="invite.php?id='.$id_partida.'"';?>>Gestionar Invitaciónes</a>
                                </li>
                                <li>
                                    <a <?php echo 'href="gestionar_experiencia.php?id='.$id_partida.'"';?>>Gestionar Experiencia</a>
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
                                <th>Usuario</th>
                                <th>Personaje</th>
                                <th class='text-center'>Nivel</th>
                                <th class='text-center'>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../../System/Classes/Personaje.php";
                            require_once "../../System/Classes/Usuario.php";
                            
                            //Buscar per partida-Usuari, id partida, agafar tots els usaris que estan en true i agafem la id_usuari
                            //Tenim tots els usuaris de la pratida acceptats.
                            //agafar la id del usuari a la funció que esborra els usuaris,
                            //i si se vol fer millor, agafo la funció dintre Protocol
                            //comprovar si te personaje en partida i si no es null esborrar el personaje per id_personaje en id_partida
                            
                            
                            $PartidaUsuario = new Partida_Usuari();
                            $PartidaUsuario = $PartidaUsuario->selectUsers($id_partida);
                            /*Mostrem tots els personatges que siguin d'aquesta partida*/
                            //Si hi ha personatges en la partida entrem al if
                            if (!empty($PartidaUsuario)) {
                                //per a cada personatge busquem el seu usuari per la id_usuario
                                foreach ($PartidaUsuario as $linia) {
                                    // id del usuari
                                    $id_Usuari = $linia->getId_Usuario();
                                    
                                    // obtenim les dades del usuari
                                    $usuari = new Usuario();
                                    $datos = $usuari->return_user($id_Usuari);
                                    
                                    $nickname = $usuari->getNickname();
                                    // busquem si te un pj i sino mostrem que no en te.
                                    //Busquem dinte de personaje si la id del usuari te cap id personaje i si coincideix en la fila les id de partida
                                    $personaje = new Personaje();
                                    $personajeUsuarioPartida = $personaje->viewPersonajeUsuario($id_Usuari, $id_partida);
                                    
                                    if (!empty($personajeUsuarioPartida)){
                                        //si te un pj
                                        echo "<tr>
                                        <td class='text-capitalize text-success'>".$datos['nickname']."</td>                                    
                                        <td class='text-capitalize text-info'>".$personajeUsuarioPartida['nombre']."</td>
                                        <td class='text-danger text-center'>".$personajeUsuarioPartida['nivel']."</td>
                                        <td class='text-center'>
                                        <label class='m-r-10 p-0 '>
                                                    <a href='../../System/Protocols/Partida_SignoutMaster.php?idp=".$id_partida."&idu=".$id_Usuari."'>
                                                        <i class='zmdi zmdi-delete c-black f-16 c-red '></i>
                                                    </a>
                                            </label>
                                        </tr>";
                                    }else{
                                        //Si no en te
                                        echo "<tr>
                                        <td class='text-capitalize text-success'>".$datos['nickname']."</td>                                    
                                        <td class='text-capitalize text-info'> ??? </td>
                                        <td class='text-danger text-center'> ??? </td>
                                        <td class='text-center'>
                                        <label class='m-r-10 p-0 '>
                                                    <a href='../../System/Protocols/Partida_SignoutMaster.php?idp=".$id_partida."&idu=".$id_Usuari."'>
                                                        <i class='zmdi zmdi-delete c-black f-16 c-red '></i>
                                                    </a>
                                            </label>
                                        </tr>";
                                    }
                                }
                            }
                            
                            ?>
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
    <div class="row">
        <div class="col-md-12">
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
                                <th>Nombre</th>
                                <th>Nivel</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            require_once "../../System/Classes/Personaje.php";
                            require_once "../../System/Classes/Usuario.php";
                            require_once "../../System/Classes/Categoria.php"; 
                            $personajes = new Personaje();
                            $personajes = $personajes->viewPNJ($master, $id_partida);
                            if (!empty($personajes)) {
                                foreach ($personajes as $row) {
                                    $id_cat = $row->getId_Categoria();
                                    $categoria = new Categoria();
                                    $categoria = $categoria->viewCar($id_cat);
                                    $cat = $categoria->getNombre();
                                    echo "<tr >
                                        <td class='text-capitalize text-success'>".$row->getNombre()."</td>
                                        <td class='text-capitalize text-success'>".$row->getNivel()."</td>
                                        <td class='text-capitalize text-success'>".$cat."</td>
                                        </tr >";
                                }
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
