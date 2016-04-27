<!-- Header content box -->
<?php 
$title='Actualitzar compte';
$migas='#Home|../index.php#Configuració';
include "../Public/layouts/head.php";?>
<LINK HREF="../Public/css/mesa.css" rel="stylesheet">


<!-- Content body -->
<h2>¿Estas segura para eliminar la cuenta?</h2>
<form action="" method="post">

<input type = "submit" name="yes" value="SI">
<input type = "submit" name="no" value="NO">

</form>

<?php
 
 if(isset($_POST['yes'])){
	 //header ('Location: ../System/Protocols/delComp.php');
         echo "<script>window.open('../System/Protocols/delComp.php','_self')</script>";
	 }
	 
	 if(isset($_POST['no'])){	 
	 echo "<script>alert('Cuenta no esta eliminada.')</script>";
	 echo "<script>window.open('index.php','_self')</script>";
	 }
 ?>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

