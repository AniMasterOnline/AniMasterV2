<!-- Header content box -->
<?php 
$title='Registrar';
$migas='#Index|index.php';
include "Public/layouts/head.php";?>

<script>
    $(function() {
        
        $('#methods').mousedown(function() {
            $('#inputPass').password('toggle');
        });
        $('#methods').mouseup(function() {
            $('#inputPass').password('toggle');
        });
        $('#methods2').mousedown(function() {
            $('#inputPass2').password('show');
        });
        $('#methods2').mouseup(function() {
            $('#inputPass2').password('hide');
        });
    });
</script>
<!-- Body content box -->
<div class="container" >
    <form method="POST" name="myForm" action="System/Protocols/Usuari_Signin.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12 cinput">
                <h2 class="form-signin-heading">Únete hoy a Animaster Online v2</h2>
            </div>
            <div class="col-md-12 cinput">
                <label for="inputUser" class="sr-only">Usuario</label>
                <input type="text"  id="inputUser"  class="form-control" name="user" placeholder="Usuario *" required autofocus>
            </div>
            <div class="col-md-12 cinput" id="alertUser">
                
            </div>
            
            <div class="col-md-6 cinput">
                <div class="input-group">
                    <label for="inputPass" class="sr-only">Contraseña</label>
                    <input type="password"  id="inputPass"  class="form-control" name="pass" placeholder="Contraseña *" required>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="methods"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </span>
                </div>
            </div>
            <div class="col-md-6 cinput">
                <div class="input-group">
                    <label for="inputPass2" class="sr-only">Repite tu contraseña</label>
                    <input type="password"  id="inputPass2"  class="form-control" name="pass2" placeholder="Repite tu contraseña *" required>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="methods2"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </span>
                </div>
            </div>
            <div class="col-md-12 cinput" id="alertPass">
                
            </div>
            
            <div class="col-md-6 cinput">
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="text"  id="inputEmail"  class="form-control" name="email" placeholder="E-mail *" required>
            </div>
            <div class="col-md-6 cinput">
                <label for="inputEmail2" class="sr-only">Repite tu e-mail</label>
                <input type="text"  id="inputEmail2"  class="form-control" name="email2" placeholder="Repite tu e-mail *" required>
            </div>
            <div class="col-md-12 cinput" id="alertEmail">
                
            </div>
            <div class="col-md-12 cinput">
                <button class="btn btn-lg btn-success btn-block" type="submit">Registra't</button>
            </div>  
            <div class="col-md-12" id="alertmsg">
                <div class="alert alert-info" role="alert">
                    Al registrar-te, acceptes les <a class="link" href="#">Condicions del Servei</a> i la <a class="link" href="#">Política de Privacitat</a>, 
                    incluïnt el <a class="link" href="#">Ús de Cookies</a>.
                </div>
            </div> 
                
                
        </div>
    </form>
</div> <!-- /container -->

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

