<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php';
include "Public/layouts/head.php";?>

<!-- Content body -->
<script>
    function loginsend(){
        var user = document.getElementById('user').value;
        var pass = document.getElementById('pass').value;
        var parametros = {
            "user" : user,
            "pass" : pass
        };
    }
</script>
<!-- Body box -->
<div class="container" >
      <form class="form-signin" method="POST">
          <div class="row">
                <div class="col-md-12 cinput">
                    <h2 class="form-signin-heading">Inicia sesión en Animaster Online v2</h2>
                </div>
                <div class="col-md-12 cinput">
                    <label for="inputUser" class="sr-only">Usuario</label>
                    <input type="text"  id="inputUser"  class="form-control" name="user" placeholder="Usuario" required autofocus>
                </div>
                <div class="col-md-12 cinput">
                    <label for="inputPassword" class="sr-only">Contraseña</label>
                    <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Contraseña" required>
                </div>
                <div class="col-md-12 cinput">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                </div>
                <div class="col-md-12 cinput">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="loginsend()">Login</button>
                </div>
                <div class="col-md-12" id="alertmsg">
                </div> 
        <?php
        
        ?>
      </form>
</div> <!-- /container -->

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

