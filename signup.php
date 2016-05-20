<!-- Header content box -->
<?php 
$title='Registrar';
$migas='#Index|index.php';
include "Public/layouts/head.php";?>

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
        $('#methods2').mousedown(function() {
            var pass = $('#inputPass2').clone();
            $('#inputPass2').remove();
            pass.attr('type','text');
            pass.insertAfter('#inputPass2Label');
        });
        $('#methods2').mouseup(function() {
            var pass = $('#inputPass2').clone();
            $('#inputPass2').remove();
            pass.attr('type','password');
            pass.insertAfter('#inputPass2Label');
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
                <input type="text"  id="inputUser"  class="form-control" name="user" placeholder="Usuario *" value="" required autofocus>
            </div>
            <div class="col-md-12 cinput" id="alertUser">
                
            </div>
            
            <div class="col-md-6 cinput">
                <div class="input-group">
                    <label for="inputPass" id="inputPassLabel"class="sr-only">Contraseña</label>
                    <input type="password"  id="inputPass"  class="form-control" name="pass" placeholder="Contraseña *" required>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="methods"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </span>
                </div>
            </div>
            
            <div class="col-md-6 cinput">
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="text"  id="inputEmail"  class="form-control" name="email" placeholder="E-mail *" required>
            </div>
            <div class="col-md-12 cinput">
                <button class="btn btn-lg bgm-green c-white btn-block" type="submit">Registrate ya!</button>
            </div>  
            <div class="col-md-12" id="alertmsg">
                <div class="alert alert-default" role="alert">
                    Al registrarte, aceptas las <a class="link" href="#">Condiciones del Servicio </a> y la <a class="link" href="#">Política de Privacidad</a>, 
                    Incluso el <a class="link" href="#">Uso de Cookies</a>.
                </div>
            </div> 
                
                
        </div>
    </form>
</div> <!-- /container -->

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

