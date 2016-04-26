<!-- Header content box -->
<?php 
$title='Actualitzar compte';
$migas='#Index|index.php';
include "../Public/layouts/head.php";?>
<LINK HREF="../Public/css/mesa.css" rel="stylesheet">

<!-- Content body -->
<form method="POST" name="myForm" action="../System/Protocols/Usuari_Identity.php">
    <input class="input" id="nom" placeholder="Nom" type="text" name="nom" maxlength="32">
    <input class="input" id="cognom" placeholder="Cognom" type="text" name="cognom" maxlength="32">
    <input id="logbutton" type="submit" value="Envia">
</form>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

