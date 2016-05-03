</body>
<?php
if (strpos($self,"AniMasterV2/index.php")){
    echo '  <footer id="footer" class="c-gray">
                Copyright © 2016 Animaster Online v2
                <ul class="f-menu">';
                if(!isset($_SESSION['user'])){
                    echo '  <li><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Registrate</a></li>';
                }  
              echo '<li><a href="help.php">Ayuda</a></li>
                    <li><a href="help.php">Preguntas frecuentes</a></li>
                    <li><a href="help.php">Soporte</a></li>
                    <li><a href="mailto:support@animaster.com">Contact</a></li>
                </ul>
            </footer>';
}
?>

</html>
