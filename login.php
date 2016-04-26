<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php';
include "Public/layouts/head.php";?>
<LINK HREF="Public/css/mesa.css" rel="stylesheet">


<!-- Content body -->
<script>
    function loginsend(){
        var user = document.getElementById('user').value;
        var pass = document.getElementById('pass').value;
        var parametros = {
            "user" : user,
            "pass" : pass
        };
        $.ajax({
            data:  parametros,
            type: "POST",
            url: "System/Protocols/Usuari_Login.php",
            success: function (response) {
                if(response === "fail"){
                    var fail = "<div class='alert' role='alert'>Les dades d'identificació no son correctes</div>";
                    $('#alertfail').empty().append(fail);
                }else if(response === "succes"){
                    window.location.href = 'index.php';
                }
            }
        });
    }
</script>
<!-- Body box -->
<div class="body-box">
    <!-- Login content box -->
    <div class="content-title">
        Animaster Login
    </div>
    <div class="content-body">
        <form>
            <div class="form-content"> 
                <div class="input-1">
                    <input class="input" id="user" placeholder="Usuari" value="" type="text" name="user" maxlength="16"  autofocus required>
                </div>
                <div class="input-1">
                    <input class="input" id="pass" placeholder="Contrasenya" value="" type="password" name="pass" maxlength="16" required>
                </div>
                <div class="input-1">
                    <input id="logbutton" type="button" value="Login" name="login" onclick="loginsend()">
                </div>
                <div class="input-1" id="alertfail">
                </div>
            </div>       
        </form>
    </div> 
</div>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

