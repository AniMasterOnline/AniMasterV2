<!-- User Menu -- Header content box -->
<?php 
$title='Index';
$migas='#Home|../index.php#Configuració';
include "../Public/layouts/head.php";?>

<!-- Body content box -->
<div class="container-fluid ">
    <div class="row" >
        <div class="col-md-3 col-margin">
            <div class="row">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <img src="../Public/img/login.png" alt="...">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>...</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Cras justo odio</a>
                        <a href="delUser.php" class="list-group-item">Eliminar</a>
                        <a href="modIdent.php" class="list-group-item">Identitat</a>
                        <a href="modImatge.php" class="list-group-item">Image</a>
                        <a href="modPhone.php" class="list-group-item">Telefono</a>
                        <a href="modEmail.php" class="list-group-item">Email</a>
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
            
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                  Panel content
                </div>
                <div class="panel-footer">Panel footer</div>
            </div>
            
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                  Panel content
                </div>
                <div class="panel-footer">Panel footer</div>
            </div>
            
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
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

