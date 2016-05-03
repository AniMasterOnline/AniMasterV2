<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php';
include "Public/layouts/head.php";?>
<script>
    $title = "test";
    $body = "test body";
    $icon = "favicon.ico";
    //DesktopNotifyshow($title, $body, $icon);
</script>

<!-- Body box -->
<div class="container" >
    <form class="form-signin" method="POST" action="login.php">
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
                <button class="btn btn-lg bgm-lightblue c-white btn-block" name="login" type="submit">Login</button>
            </div>
            <div class="col-md-12" id="alertmsg"></div>
        </div>
    </form>
</div> <!-- /container -->
<?php
    require_once('System/Classes/Usuario.php');
    if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $usuari = new Usuario();
    $usuari = $usuari->verificar_login($user,$pass);
        if( $usuari != null){ 
            $_SESSION['user'] = $usuari;
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'">';
        }else{
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
        } 
    }
?>
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

