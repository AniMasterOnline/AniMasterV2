<!-- User Menu -- Header content box -->
<?php 
$title='Personajes';
$migas='#Home|../../index.php#Configuración#Personajes|../../settings/characters/';
include "../../Public/layouts/head.php";?>

<!-- Body content box -->
<div class="container">
    <div class="row" >
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
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
                        <a href="../../settings/password/" class="list-group-item">Contraseña</a>
                        <a href="../../settings/notifications/" class="list-group-item ">Mensajes</a>
                        <a href="../../settings/table/" class="list-group-item">Mesa</a>
                        <a href="../../settings/characters/" class="list-group-item active">Personajes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <div class="panel panel-primary">
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

