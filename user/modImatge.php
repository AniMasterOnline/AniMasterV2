<!-- Header content box -->
<?php 
$title='Actualitzar compte';
$migas='#Home|../index.php#Configuració';
include "../Public/layouts/head.php";?>
<LINK HREF="../Public/css/mesa.css" rel="stylesheet">


<!-- Content body -->
<form method="POST" name="myForm" action="../System/Protocols/Usuari_Image.php" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="user-info">
                <div class="input-2">
                    <input class="input" id="nom" type="file" name="imatge" maxlength="32">
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
