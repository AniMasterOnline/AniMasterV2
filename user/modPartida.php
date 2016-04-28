<?php 
$title='Modificar partida';
$migas='#Home|../index.php#Configuració';
include "../Public/layouts/head.php";?>

<?php
$id_partida=$_POST['id_partida'];
$nombre=$_POST['nombre'];
$desc=$_POST['desc'];
$imagen=$_POST['imagen'];
$anyo=$_POST['anyo'];
$nivel=$_POST['nivel'];
?>
<!-- Content body -->
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
</style>

<!-- Body content box -->
<div class="container" >
    <form method="POST" name="myForm" action="../System/Protocols/Partida_Mod.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12 cinput">
                <h2 class="form-signin-heading">Modificar partida</h2>
            </div>
            <div class="col-md-12 cinput">
                <input type="hidden"  id="inputNombre"  class="form-control" name="id_partida" value="<?php echo $id_partida ?>" required autofocus>
            </div>
            <div class="col-md-12 cinput">
                <label for="inputNombre" class="sr-only">Nombre</label>
                <input type="text"  id="inputNombre"  class="form-control" name="nombre" placeholder="Nombre *" value="<?php echo $nombre ?>" required autofocus>
            </div>
            
            <div class="col-md-6 cinput">
                <label for="inputDescripcion" class="sr-only">Descripcion</label>
                <input type="text"  id="inputDescripcion"  class="form-control" name="descripcion" placeholder="Descripcion *" value="<?php echo $desc ?>" required>
            </div>
 
            <div class="col-md-6 cinput">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse… <input type="file" name="imagen" required>
                        </span>
                    </span>
                    <input id="fileselected" class="form-control" readonly="" type="text" style="width:430px;">
                    <a href="#myModal" data-toggle="modal"><img src="../Public/img/partida/<?php echo $imagen ?>" style="width:33px; height:33px;"></a>
                    
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
                </script>
            </div>
            
            <div class="col-md-6 cinput">
                <label for="inputAnyo" class="sr-only">Año</label>
                <input type="text"  id="inputAnyo"  class="form-control" name="anyo" placeholder="Año *" value="<?php echo $anyo ?>" required>
            </div>
            
            <div class="col-md-6 cinput">
                <label for="inputNivel" class="sr-only">Nivel</label>
                <input type="text"  id="inputNivel"  class="form-control" name="nivel" placeholder="Nivel *" value="<?php echo $nivel ?>"  required>
            </div>
            
            <div class="col-md-12 cinput">
                <button class="btn btn-lg btn-success btn-block" type="submit">Modificar Partida</button>
            </div>
            
        </div>
    </form>
</div>

<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
        <div class="modal-body">
            <img src="../Public/img/partida/<?php echo $imagen ?>" style="width: 500px; height: 450px;">
        </div>
  </div>
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

