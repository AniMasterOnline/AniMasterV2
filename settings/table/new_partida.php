<!-- User Menu -- Header content box -->
<?php 
if(isset($_GET["pos"]) && !empty($_GET["pos"]) && ($_GET["pos"] >= 1 && $_GET["pos"] <= 9)){
    
}else{
    echo '<META http-equiv="refresh" content="0;URL=index.php">';
}

$title='Index';
$migas='#Inicio|../../index.php#Mesa|../../settings/table/#NewSlot <i class="fa fa-angle-right" aria-hidden="true"></i> '.$_GET["pos"];
include "../../Public/layouts/head.php";


?>

<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    .output{
        background-color: whitesmoke;
        width: 100%;
        height: 250px;
    }
    .output > img{
        width: 100%;
        height: 100%;
    }
    textarea {
        resize: none;
        height: 4em;
    }
</style>

<!-- Body content box -->
<div class="container" >
    <form method="POST" name="myForm" action="../../System/Protocols/Partida_Crear.php" enctype="multipart/form-data">
        <?php
            echo '<input type="hidden"  id="inputPos" class="form-control" name="pos" value="'.$_GET["pos"].'" readonly >';
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 cinput m-l-15 ">
                    <h2 class="form-signin-heading">Crear nueva partida <small><?php echo 'Slot-'.$_GET["pos"]; ?></small></h2>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 cinput ">
                        <label for="inputNombre" class="sr-only">Nombre</label>
                        <input type="text"  id="inputNombre"  class="form-control" name="nombre" placeholder="Nombre *" required autofocus>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputAnyo" class="sr-only">Año</label>
                        <input type="text"  id="inputAnyo"  class="form-control" name="anyo" placeholder="Año *" required>
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputNivel" class="sr-only">Nivel</label>
                        <input type="text"  id="inputNivel"  class="form-control" name="nivel" placeholder="Nivel *" required>
                    </div>
                    <div class="col-md-12 cinput">
                        <label for="inputDescripcion" class="sr-only">Descripcion</label>
                        <textarea type="text"  id="inputDescripcion"  class="form-control" name="descripcion" placeholder="Descripcion *" rows="10" required></textarea>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="output m-b-10">
                        <img id="output" >
                    </div>
                    <div class="col-md-12 cinput">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Browse… <input type="file" name="imagen" onchange="loadFile(event)">
                                </span>
                            </span>
                            <input id="fileselected" class="form-control " readonly="" type="text" >
                        </div>
                        <script>
                            $(document).ready( function() {
                                $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
                                    console.log(numFiles);
                                    console.log(label);
                                    $('#fileselected').val(label);
                                });
                                $(document).on('change', '.btn-file :file', function() {
                                    var input = $(this),
                                        numFiles = input.get(0).files ? input.get(0).files.length : 1,
                                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                                        input.trigger('fileselect', [numFiles, label]);
                                });
                            });
                            var loadFile = function(event) {
                                console.log('here');
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                    </div>
                </div>
                <div class="col-md-12 cinput">
                    <button class="btn btn-lg btn-success btn-block" type="submit">Crear Partida</button>
                </div>
            </div>
            
        </div>
    </form>
</div> 
    <hr>
    <div class="col-md-12 cinput">
        <h2 class="form-signin-heading">Lista de partida</h2>
    </div>
    
<?php
include "../../System/Classes/Partida.php";
$partida=new Partida();
$partida=$partida->view_all();
foreach ($partida as $row){
    $id_partida = $row->getId_Partida();
    $nombre = $row->getNombre();
    $desc = $row->getDescripcion();
    $anyo = $row->getAnyo();
    $imagen= $row->getImagen();
    $nivel=$row->getNv_Sobrenatural();
    
    echo '<tr>'
    . '<td>'.$id_partida.' </td>'
    . '<td>'.$nombre.' </td>'
    . '<td>'.$desc.' </td>'
    . '<td>'.$anyo.' </td>'
    . '<td>'.$imagen.' </td>'
    . '<td>'.$nivel.'</td>'
    . '<td><form method="POST" action="modPartida.php">'
            . '<input type="hidden" name="id_partida" value="'.$id_partida.'">'
            . '<input type="hidden" name="nombre" value="'.$nombre.'">'
            . '<input type="hidden" name="desc" value="'.$desc.'">'
            . '<input type="hidden" name="imagen" value="'.$imagen.'">'
            . '<input type="hidden" name="nivel" value="'.$nivel.'">'
            . '<input type="hidden" name="anyo" value="'.$anyo.'">'
            . '<input type="submit" name="modificar" value="Modificar">'
            . '</form></td>'
    . '<td><form method="POST" action="../System/Protocols/Partida_Del.php">'
            . '<input type="hidden" name="id_partida" value="'.$id_partida.'">'
            . '<input type="submit" name="eliminar" value="Eliminar">'
            . '</form></td>'
            . '</tr></table>';
}
?>
    </div>
<?php include "../../Public/layouts/footer.php";?> 

