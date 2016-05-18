</body>
<?php
if (strpos($self,"AniMasterV2/index.php")){
    echo '  <footer id="footer" class="c-gray">
                <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">AniMaster v2</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Marc, David and Gurwinder</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Reconocimiento-CompartirIgual 4.0 Internacional License</a>
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
