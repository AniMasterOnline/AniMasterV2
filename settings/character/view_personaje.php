<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    //var_dump($value);
}
if(isset($_GET['id_personaje']) && !empty($_GET['id_personaje'])){
    $id_personaje = $_GET['id_personaje'];
}else{
    include '../404/404.php';
}

$title='Panel del personaje';
$migas='#Home|../../index.php#Zone|../../zone.php#Personaje|view_partida.php?id_personaje='.$id_personaje;
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
                        id: <?php echo $id_personaje ?>
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
                    <h2 class="lvh-label c-white f-18">Nombre</h2>
                    <ul class="lv-actions actions">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                <i class="zmdi zmdi-more-vert c-white"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a <?php echo 'href="mod_personaje.php?id='.$id_personaje.'"';?>>Modificar personaje</a>
                                </li>
                                <li>
                                    <a href="#" id="eliminar">Eliminar personaje</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding table-responsive p-0">
                    <table class="table b-0 m-0">
                        <thead class="bgm-purple b-0 c-white">
                            <tr>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Nivel</th>
                                <th>Raza</th>
                                <th>P.Desarrollo</th>
                                <th>Apariencia</th>
                                <th>Tamaño</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Pelo / Ojos</th>
                                <th>Altura / Peso</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td>Eliel</td>
                                <td>Mago</td>
                                <td>3</td>
                                <td>Sylvain</td>
                                <td>1400</td>
                                <td>9</td>
                                <td>15</td>
                                <td>170</td>
                                <td>Mujer</td>
                                <td>Blanco / Azul Turquesa</td>
                                <td>1,61 / 60kg</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table b-0 m-0">
                        <thead class="bgm-purple b-0 c-white">
                            <tr>
                                <th class="text-center">Agi</th>
                                <th class="text-center">Con</th>
                                <th class="text-center">Des</th>
                                <th class="text-center">Fue</th>
                                <th class="text-center">Int</th>
                                <th class="text-center">Per</th>
                                <th class="text-center">Pod</th>
                                <th class="text-center">Vol</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <th class="text-center">11</th>
                                <th class="text-center">8</th>
                                <th class="text-center">13</th>
                                <th class="text-center">8</th>
                                <th class="text-center">14</th>
                                <th class="text-center">8</th>
                                <th class="text-center">14</th>
                                <th class="text-center">12</th>
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
                    <h2 class="lvh-label  c-white f-18">Habilidades Primarias </h2>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-deeporange b-0 c-white">
                            <tr>
                                <th>Habilidad</th>
                                <th>Base</th>
                                <th>Des</th>
                                <th>Cat</th>
                                <th>B.Agi</th>
                                <th>Esp</th>
                                <th>Final</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td class="text-capitalize">ataque</td>
                                <td>0</td>
                                <td>25</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-0 bgm-green z-depth-1-bottom">
                    <h2 class="lvh-label  c-white f-18">Habilidades Secundarias </h2>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-lightgreen b-0 c-white">
                            <tr>
                                <th>Nombre</th>
                                <th>Base</th>
                                <th>Bono</th>
                                <th>Esp</th>
                                <th>Cat</th>
                                <th>Final</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td class="text-capitalize">Acrobacias</td>
                                <td>40</td>
                                <td>20</td>
                                <td>0</td>
                                <td>0</td>
                                <td>70</td>
                            </tr>
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
                    <h2 class="lvh-label c-white f-18">Inventario</h2>
                </div>
                <div class="card-body card-padding table-responsive p-0 card-body-partida">
                    <table class="table b-0">
                        <thead class="bgm-lightblue b-0 c-white">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>???</th>
                                <th>???</th>
                                <th>???</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr >
                                <td>1</td>
                                <td class="text-capitalize">Name</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include "../../Public/layouts/footer.php";?> 
