<!-- User Menu -- Header content box -->
<?php 
$title='Mensajes';
$migas='#Home|../../index.php#Configuración#Mensajes|../../settings/notifications/';
include "../../Public/layouts/head.php";?>

<!-- Body content box -->
<div class="container-fluid ">
    <div class="row" >
        <div class="col-md-3 col-margin">
            <div class="row">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <?php
                            if($value['imagen'] == ""){
                                echo '<img src="../../Public/img/login.png" alt="...">';
                            }else{
                                echo '<img src="../../Public/img/usuarios/'.$value['imagen'].'" alt="...">';
                            }
                        ?>
                        
                        <div class="caption ">
                            <h3 style="text-align: left;"><?php echo $value['nickname'];?><br><small>#<?php if($value['nombre'] == "" ){ echo ' =D'; }else{ echo $value['nombre'].' '.$value['apellido']; }?></small></h3>
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="../../settings/account/" class="list-group-item">Cuenta</a>
                        <a href="../../settings/password/" class="list-group-item">Contraseña</a>
                        <a href="../../settings/notifications/" class="list-group-item active">Mensajes</a>
                        <a href="../../settings/table/" class="list-group-item">Mesa</a>
                        <a href="../../settings/characters/" class="list-group-item">Personajes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-margin">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                  Panel content
                </div>
                <table class="table"> 
                    <thead> 
                        <tr> 
                            <th>#</th> 
                            <th>First Name</th> 
                            <th>Last Name</th> 
                            <th>Username</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        <tr> 
                            <th scope="row">1</th> 
                            <td>Mark</td> 
                            <td>Otto</td> 
                            <td>@mdo</td> 
                        </tr> 
                        <tr> 
                            <th scope="row">2</th> 
                            <td>Jacob</td> 
                            <td>Thornton</td> 
                            <td>@fat</td> 
                        </tr> 
                        <tr> 
                            <th scope="row">3</th> 
                            <td>Larry</td> 
                            <td>the Bird</td> 
                            <td>@twitter</td> 
                        </tr> 
                    </tbody> 
                </table>
                <div class="panel-footer">Panel footer</div>
            </div>
            
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                  Panel content
                </div>
                <ul class="list-group">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="panel-footer">Panel footer</div>
            </div>
            
        </div>
    </div>
</div>

<?php include "../../Public/layouts/footer.php";?> 



