<!-- Header content box -->
<?php 
$title='Actualitzar compte';
$migas='#Home|../index.php#Configuració';
include "../Public/layouts/head.php";?>


<!-- Content body -->
<form method="POST" name="myForm" action="../System/Protocols/Usuari_Identity.php" onsubmit="return validateForm()">
            <div class="user-info">
                <div class="input-2">
                    <input class="input" id="nom" placeholder="Nom" type="text" name="nom" maxlength="32">
                    <input class="input" id="cognom" placeholder="Cognom" type="text" name="cognom" maxlength="32">
                </div>
                <div class="input-2">
                    <div id="alertnom"></div>
                    <div id="alertcognom"></div>
                </div>
            </div>
            <div style="border:none;" class="user-info" >
                <div class="input-1">
                    <input id="logbutton" type="submit" value="Envia">
                </div>
            </div>
        </form>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

