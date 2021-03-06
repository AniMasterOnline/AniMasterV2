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
?>

<?php 
$title='Modificar partida';
$migas='#Home|../../index.php#Mesa|../../settings/table/#'.$nombre.'|view_partida.php?id='.$id_partida.'#Modificar Partida';
include "../../Public/layouts/head.php";?>

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
    <form method="POST" name="myForm" action="../../System/Protocols/Partida_Mod.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 cinput m-l-15 ">
                    <h2 class="form-signin-heading">Modificar partida <small><?php echo $nombre; ?></small></h2>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 cinput ">
                        <div class="input-group">
                            <span class="input-group-addon">Jugadores Máximos</span>
                            <select id="max-players" class="selectpicker form-control" name="max_players" data-live-search="false" title=" Nº de jugadores" required>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                            </select>
                        </div>
                        <input type="hidden"  id="id_partida"  class="form-control" name="id_partida" value="<?php echo $id_partida ?>">
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputAnyo" class="sr-only">Año</label>
                        <input type="text"  id="inputAnyo"  class="form-control" name="anyo" placeholder="Año *" value="<?php echo $anyo ?>" required title="año de la partida">
                    </div>
                    <div class="col-md-6 cinput">
                        <label for="inputNivel" class="sr-only">Nivel</label>
                        <input type="text"  id="inputNivel"  class="form-control" name="nivel" placeholder="Nivel *" value="<?php echo $nv_sobrenatural ?>" required title="Nivel sobrenatural de la partida">
                    </div>
                    <div class="col-md-12 cinput">
                        <label for="inputDescripcion" class="sr-only">Descripcion</label>
                        <textarea type="text"  id="inputDescripcion"  class="form-control" name="descripcion" placeholder="Descripcion *" rows="10" required title="descripción de la partida"><?php echo $descripcion ?></textarea>
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
                                    Browse… <input type="file" name="imagen" onchange="loadFile(event)" required>
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
                    <button class="btn btn-lg btn-warning btn-block" type="submit">Modificar Partida</button>
                </div>
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
<?php include "../../Public/layouts/footer.php";?> 

