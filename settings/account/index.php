<!-- User Menu -- Header content box -->
<?php 
$title='Cuenta';
$migas='#Home|../../index.php#Configuración#Cuenta|../../settings/account/';
include "../../Public/layouts/head.php";?>

<?php
/* $timeout = 5;//segundos que session no se disconecta
if(isset($_SESSION['timeout'])) {
    $duration = time() - (int)$_SESSION['timeout'];
    if($duration > $timeout) {
        echo "<script>alert('Session expired!');</script>";
        echo "<script> window.open('../logout.php','_self');</script>";
    }
}
$_SESSION['timeout'] = time();*/
?>

<script>
$(document).ready(function(){
    $('#mod1').click(function(){
        var user = {
            user : $('#inputUser').val()
        };
        var email = {
            email : $('#inputEmail').val()
        };
        $.ajax({
            type: "POST",
            url: "../../System/Protocols/Usuari_Nickname.php",
            data: user,
            success: function (response) {
                if(response == 001){
                    $.notify({
                            // options
                            message: 'NickName no disponible.'
                    },{
                            // settings
                            type: 'warning',
                            delay: 4000,
                            offset : {
                                    y: 100,
                                    x: 20
                            }
                    });
                }else if(response == 002){
                    
                }else if(response == 003){
                    location.reload();
                }
            }
        });
        $.ajax({
            type: "POST",
            url: "../../System/Protocols/Usuari_Email.php",
            data: email,
            success: function (response) {
                if(response == 001){
                    $.notify({
                            // options
                            message: 'E-mail no disponible.'
                    },{
                            // settings
                            type: 'warning',
                            delay: 4000,
                            offset : {
                                    y: 100,
                                    x: 20
                            }
                    });
                }else if(response == 002){
                    
                }else if(response == 003){
                    location.reload();
                }
            }
        });
    });
    
});

</script>
<!-- Body content box -->
<div class="container">
    <div class="row" >
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
            <div class="row">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <?php
                            if($value['imagen'] == ""){
                                echo '<img class="img-rounded" src="../../Public/img/login.png" alt="...">';
                            }else{
                                echo '<img src="../../Public/img/usuarios/'.$value['imagen'].'" alt="...">';
                            }
                        ?>
                        
                        <div class="caption ">
                            <h3 style="text-align: left;"><?php echo $value['nickname'];?><br><small>#<?php if($value['nombre'] == "" ){ echo ' =D'; }else{ echo $value['nombre'].' '.$value['apellido']; }?></small></h3>
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="../../settings/account/" class="list-group-item active">Cuenta</a>
                        <a href="../../settings/password/" class="list-group-item">Contraseña</a>
                        <a href="../../settings/notifications/" class="list-group-item">Mensajes<span class="badge">42</span></a>
                        <a href="../../settings/table/" class="list-group-item">Mesa</a>
                        <a href="../../settings/characters/" class="list-group-item">Personajes <span class="badge">1</span></a>
                        <a href="#" class="list-group-item btn-alert">Click Me</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 ">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Cuenta<br>
                        <small>Cambia tus configuraciones básicas de cuenta.</small>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Usuario</span>
                            <input type="text" class="form-control" id="inputUser" name="user" placeholder="Usuario" aria-describedby="basic-addon1" value="<?php echo $value['nickname']?>">
                        </div>
                    </div>
                    
                    <div class="col-md-12 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon2">E-mail&nbsp;&nbsp;</span>
                            <input type="text" class="form-control" id="inputEmail" name="email" placeholder="E-mail" aria-describedby="basic-addon2" value="<?php echo $value['email']?>">
                        </div>
                    </div>
                    <div class="col-md-12 cinput">
                        <button type="button" id="mod1" class="btn btn-success btn-xs" onsubmit="valpass()">Guardar cambios</button>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Identidad & Contacto<br>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-4 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">Nombre</span>
                            <?php 
                                if($value['nombre'] == ""){
                                    echo '<input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre" aria-describedby="basic-addon3">';
                                }else{
                                    echo '<input disabled type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre" aria-describedby="basic-addon3" value="'. $value['nombre'].'">';
                                }
                            
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-md-4 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon4">Apellido</span>
                            <?php 
                                if($value['nombre'] == ""){
                                    echo '<input type="text" class="form-control" id="inputApellido" name="apellido" placeholder="Apellido" aria-describedby="basic-addon4">';
                                }else{
                                    echo '<input disabled type="text" class="form-control" id="inputApellido" name="apellido" placeholder="Apellido" aria-describedby="basic-addon4" value="'. $value['apellido'].'">';
                                }
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-md-4 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon5">Telefono</span>
                            <input type="text" class="form-control" id="inputTelefono" name="telefono" placeholder="Telefono" aria-describedby="basic-addon5" onkeypress="return aceptNum(event)" onpaste="return false;" value="<?php echo $value['telefono']?>">
                        </div>
                        <script>
                            var nav4 = window.Event ? true : false;
                            var cont = 0;
                            function aceptNum(evt){
                                var key = nav4 ? evt.which : evt.keyCode;
                                return (key <= 13 || (key>= 48 && key <= 57));
                            }
                        </script>
                    </div>
                    <div class="col-md-12 cinput">
                        <button type="button" id="mod2" class="btn btn-success btn-xs">Guardar cambios</button>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Imagen de cuenta<br>
                        <small>Que tal es tener una nueva cara?</small>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 cinput">
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
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Browse… <input type="file" name="imagen" required>
                                </span>
                            </span>
                            <input id="fileselected" class="form-control" readonly="" type="text">
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
                    <div class="col-md-12 cinput">
                        <button type="button" id="mod3" class="btn btn-success btn-xs">Cambiar imagen</button>
                    </div>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Eliminar Cuenta<br>
                        <small>Esto es un adios?</small>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 cinput">
                        <div class="input-group">
                            <input type="password"  id="inputPass"  class="form-control" name="pass" placeholder="Contraseña *" required>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="methods"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            </span>
                        </div>
                        <script>
                            $(function() {
                                $('#methods').mousedown(function() {
                                    var pass = $('#inputPass').clone();
                                    $('#inputPass').remove();
                                    pass.attr('type','text');
                                    pass.insertAfter('#inputPassLabel');
                                });
                                $('#methods').mouseup(function() {
                                    var pass = $('#inputPass').clone();
                                    $('#inputPass').remove();
                                    pass.attr('type','password');
                                    pass.insertAfter('#inputPassLabel');
                                 });
                            });
                        </script>
                    </div>
                    <div class="col-md-12 cinput">
                        <button type="button" id="mod4" class="btn btn-danger btn-xs">Eliminar cuenta</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../../Public/layouts/footer.php";?> 
