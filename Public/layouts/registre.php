<form method="POST" name="myForm" action="System/Protocols/Usuari_Signin.php" enctype="multipart/form-data">
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

