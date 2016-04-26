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
        <h2 class="form-signin-heading">Login - Animaster Online v2</h2>
        <label for="inputUser" class="sr-only">Usuario</label>
        <input type="text"  id="inputUser"  class="form-control" name="user" placeholder="Usuario" required autofocus>
        
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Contraseña" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="loginsend()">Login</button>
        <?php
        
        ?>
      </form>
</div> <!-- /container -->

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

