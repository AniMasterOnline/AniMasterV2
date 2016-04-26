<script>
$( document ).ready(function() {
    //$("#logbutton").attr('disabled','disabled');
    flag_user = false;
    flag_pass = false;
    flag_email  = false;
    flag = false;
    flag2 = false;
    console.log( "ready!" );
    $("#user").blur(function () {
        ajaxuser();
    });
    $("#pass").blur(function () {
        testpass(false);
    });
    $("#pass2").blur(function () {
        testpass(true);
    });
    $("#email").blur(function () {
        testemail(false);
    });
    $("#email2").blur(function () {
        testemail(true);
    });
});

function finaltest(){
    console.log(flag_user, flag_pass, flag_email);
    if(flag_user != false && flag_pass != false && flag_email != false){
        return true;
    }else{
        return false;
    }
}
function ajaxuser(){
    var user = $("#user").val();
    var parametros = {
        "userName" : user
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "System/Protocols/Usuari_Testuser.php",
        success: function (response) {
            console.log(response);
            if(response == "yes" && user != ""){
                    $('#alertuser').empty();
                    flag_user = true;
            }else{
                if(user != ""){
                    var fail = "<div class='alert' role='alert'>¡"+user+" ja existeix!.</div>";
                }else{
                    var fail = "<div class='alert' role='alert'>Introdueix un nom d'usuari.</div>";
                }
                
                $('#alertuser').empty().append(fail);
                flag_user = false;
            }
        }
    });
}
function testpass(opc){
    var pass = $("#pass").val();
    var pass2 = $("#pass2").val();
    if((pass.length >= 6 && pass != null && !/^\s+$/.test(pass) && /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/.test(pass)) || (pass2.length >= 6 && pass2 != null && !/^\s+$/.test(pass2) && /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/.test(pass2))){
        $('#alertpass').empty();
        if(pass == pass2){
            $('#alertpass').empty();
            flag_pass = true;
        }else{
            if(opc || flag){
                flag = true;
                var fail = "<div class='alert' role='alert'>Les contrasenyes no coincideixen.</div>";
                $('#alertpass').empty().append(fail);
            }
            flag_pass = false;
        }
    }else{
        var fail = "<div class='alert' role='alert'>El format de la contrasenya no és vàlid.</div>";
        $('#alertpass').empty().append(fail);
        flag_pass = false;
    }
}
function testemail(opc){
    var mail = $("#email").val();
    var mail2 = $("#email2").val();
    if((!opc && mail != null && !/^\s+$/.test(mail) && /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail)) || (opc && mail2 != null && !/^\s+$/.test(mail2) && /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail2))){
        $('#alertemail').empty();
        if(mail != mail2){
            if(opc || flag){
                flag = true;
                var fail = "<div class='alert' role='alert'>Els e-mails no coincideixen.</div>";
                $('#alertemail').empty().append(fail);
                flag_email = false;
            }else{
                flag_email = false;
            }
        }else{
            $('#alertemail').empty();
            flag_email = true;
        }
    }else{
        var fail = "<div class='alert' role='alert'>El format del e-mail no és vàlid.</div>";
        $('#alertemail').empty().append(fail);
        flag_email = false;
    }
}
function validateForm() {
    ajaxuser();
    testpass(true);
    testemail(true);
    if(!finaltest()){
        return false;
    }
}
</script>

<form method="POST" name="myForm" action="System/Protocols/registre.php" onsubmit="return validateForm()" enctype="multipart/form-data">
    <div class="form-content"> 
        <div class="input-1">
            <input class="input" id="user" placeholder="Usuari *" type="text" name="user" maxlength="32" required>
        </div>
        <div class="input-1">
            <div id="alertuser"></div>
        </div>
        <div class="input-2">
            <input class="input" id="pass" placeholder="Contrasenya *" value="" type="password" name="pass" maxlength="16" required>
            <input class="input" id="pass2" placeholder="Repeteix Contrasenya *" value="" type="password" name="pass2" maxlength="16" required>
            
        </div>
        <div class="input-1">
            <div id="alertpass"></div>
        </div>
        <div class="input-2">    
            <input class="input" id="email" placeholder="E-mail *" value="" type="text" name="email" maxlength="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            <input class="input" id="email2" placeholder="Repeteix E-mail *" value="" type="text" name="email2" maxlength="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        </div>
        <div class="input-1">
            <div id="alertemail"></div>
        </div>
        <div class="input-2">    
            <input class="input" id="nom" placeholder="Nom *" value="" type="text" name="nom" maxlength="40" required>
            <input class="input" id="cognom" placeholder="Cognom *" value="" type="text" name="cognom" maxlength="40" required>
        </div>
        <div class="input-2">    
            <input class="input" id="telefon" placeholder="Telefon (Opcional)" value="" type="text" name="telefon" maxlength="40" required>
            <input class="input" id="pais" placeholder="Nacionalitat *" value="" type="text" name="pais" maxlength="40" required>
        </div>
        <div class="input-3">    
            <input class="input" id="imatge" value="Upload" type="file" name="image" maxlength="40" required>
        </div>
        <div class="input-1">
            <input id="logbutton" type="submit" value="Registra't">
        </div>
        <div class="input-1">
            <div id="alertmsg">
                Al registrar-te, acceptes les <a class="link" href="#">Condicions del Servei</a> i la <a class="link" href="#">Política de Privacitat</a>, 
                incluïnt el <a class="link" href="#">Ús de Cookies</a>.

            </div>
        </div>
        
    </div>
</form>

