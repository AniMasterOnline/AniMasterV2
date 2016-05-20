<!-- User Menu -- Header content box -->
<?php 
$title='Crear Partida';
$migas='#Inicio|../../index.php#Mesa|../../settings/table/#Nueva Partida';
include "../../Public/layouts/head.php";

require_once('../../System/Classes/Usuario.php');
$usuari = new Usuario();
$num_partida = $usuari->returnNum_Partidas($value['id_usuario']);

if($num_partida >= 0 && $num_partida < 9){
    
}else{
    echo '<META http-equiv="refresh" content="0;URL=index.php">';
}
?>
<!-- Body content box -->
<div class="container" >
    <form method="POST" name="myForm" action="../../System/Protocols/Partida_Crear.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 cinput m-l-15 ">
                    <h2 class="form-signin-heading">Crear nueva partida</h2>
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
                        <label for="inputDescripcion" class="sr-only">Descripción</label>
                        <textarea type="text"  id="inputDescripcion"  class="form-control" name="descripcion" placeholder="Descripción *" rows="10" required maxlength="250"></textarea>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="output m-b-10" style="border: 1px solid #333;">
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
                <div class="col-md-12 cinput m-l-15">
                    <button class="btn btn-lg btn-success btn-block" type="submit">Crear Partida</button>
                </div>
            </div>
            
        </div>
    </form>
</div> 
<?php include "../../Public/layouts/footer.php";?> 

