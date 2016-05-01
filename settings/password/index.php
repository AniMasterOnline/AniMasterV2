<!-- User Menu -- Header content box -->
<?php 
$title='Contraseña';
$migas='#Home|../../index.php#Configuración#Contraseña|../../settings/password/';
include "../../Public/layouts/head.php";?>

<!-- Body content box -->
<div class="container">
    <div class="row" >
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <?php
                            if($value['imagen'] == ""){
                                echo '<img class="img-rounded" src="../../Public/img/login.png" alt="...">';
                            }else{
                                echo '<img class="img-rounded" src="../../Public/img/usuarios/'.$value['imagen'].'" alt="...">';
                            }
                        ?>
                        
                        <div class="caption ">
                            <h3 style="text-align: left;"><?php echo $value['nickname'];?><br><small>#<?php if($value['nombre'] == "" ){ echo ' =D'; }else{ echo $value['nombre'].' '.$value['apellido']; }?></small></h3>
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="../../settings/account/" class="list-group-item">Cuenta</a>
                        <a href="../../settings/password/" class="list-group-item active">Contraseña</a>
                        <a href="../../settings/notifications/" class="list-group-item">Mensajes</a>
                        <a href="../../settings/table/" class="list-group-item">Mesa</a>
                        <a href="../../settings/characters/" class="list-group-item">Personajes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Contraseña<br>
                        <small>Cambia o recupera tu contraseña actual.</small>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 cinput">
                        <div class="input-group">
                            <label for="inputPass" id="inputPassLabel"class="sr-only">Contraseña</label>
                            <input type="password"  id="inputPassold"  class="form-control" name="passold" placeholder="Contraseña actual" required>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="methods"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            </span>
                        </div>
                        <script>
                            $(function() {
                                $('#methods').mousedown(function() {
                                    var pass = $('#inputPassold').clone();
                                    $('#inputPassold').remove();
                                    pass.attr('type','text');
                                    pass.insertAfter('#inputPassLabel');
                                });
                                $('#methods').mouseup(function() {
                                    var pass = $('#inputPassold').clone();
                                    $('#inputPassold').remove();
                                    pass.attr('type','password');
                                    pass.insertAfter('#inputPassLabel');
                                 });
                            });
                        </script>
                    </div>
                    <div class="col-md-6 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Nueva Contraseña</span>
                            <input type="password" class="form-control" id="inputPass" name="pass" placeholder="" aria-describedby="basic-addon1" >
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="methods2"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            </span>
                        </div>
                        <script>
                            $(function() {
                                $('#methods2').mousedown(function() {
                                    var pass = $('#inputPass').clone();
                                    $('#inputPass').remove();
                                    pass.attr('type','text');
                                    pass.insertAfter('#basic-addon1');
                                });
                                $('#methods2').mouseup(function() {
                                    var pass = $('#inputPass').clone();
                                    $('#inputPass').remove();
                                    pass.attr('type','password');
                                    pass.insertAfter('#basic-addon1');
                                 });
                            });
                        </script>
                    </div>
                    <div class="col-md-6 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon2">Confirmar contraseña</span>
                            <input type="password" class="form-control" id="inputPass2" name="pass2" placeholder="" aria-describedby="basic-addon2">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="methods3"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            </span>
                        </div>
                        <script>
                            $(function() {
                                $('#methods3').mousedown(function() {
                                    var pass = $('#inputPass2').clone();
                                    $('#inputPass2').remove();
                                    pass.attr('type','text');
                                    pass.insertAfter('#basic-addon2');
                                });
                                $('#methods3').mouseup(function() {
                                    var pass = $('#inputPass2').clone();
                                    $('#inputPass2').remove();
                                    pass.attr('type','password');
                                    pass.insertAfter('#basic-addon2');
                                 });
                            });
                        </script>
                    </div>
                    <div class="col-md-12 cinput">
                        <button type="button" id="mod1" class="btn btn-warning btn-xs">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../../Public/layouts/footer.php";?> 