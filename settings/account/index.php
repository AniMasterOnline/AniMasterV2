<!-- User Menu -- Header content box -->
<?php 
$title='Index';
$migas='#Home|../../index.php#Configuración';
include "../../Public/layouts/head.php";?>

<!-- Body content box -->
<div class="container-fluid ">
    <div class="row" >
        <div class="col-md-3 col-margin">
            <div class="row">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <img src="../Public/img/login.png" alt="...">
                        <div class="caption ">
                            <h3 style="text-align: left;">User <br><small>#Ident</small></h3>
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="../../settings/account/" class="list-group-item active">Cuenta</a>
                        <a href="../../settings/password/" class="list-group-item">Contraseña</a>
                        <a href="../../settings/notifications/" class="list-group-item">Mensajes</a>
                        <a href="../../settings/table/" class="list-group-item">Mesa</a>
                        <a href="../../settings/characters/" class="list-group-item">Personajes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-margin">
            
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
                            <input type="text" class="form-control" id="inputUser" name="user" placeholder="Usuario" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md-12 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon2">E-mail&nbsp;&nbsp;</span>
                            <input type="text" class="form-control" id="inputEmail" name="email" placeholder="E-mail" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-md-12 cinput">
                        <button type="button" id="mod1" class="btn btn-success btn-xs">Guardar cambios</button>
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
                            <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre" aria-describedby="basic-addon3">
                        </div>
                    </div>
                    <div class="col-md-4 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon4">Apellido</span>
                            <input type="text" class="form-control" id="inputApellido" name="apellido" placeholder="Apellido" aria-describedby="basic-addon4">
                        </div>
                    </div>
                    <div class="col-md-4 cinput">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon5">Telefono</span>
                            <input type="text" class="form-control" id="inputTelefono" name="telefono" placeholder="Telefono" aria-describedby="basic-addon5">
                        </div>
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
                  Panel content
                </div>
                <div class="panel-footer">Panel footer</div>
            </div>
        </div>
    </div>
</div>

<?php include "../Public/layouts/footer.php";?> 

