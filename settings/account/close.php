
<?php
session_start();
    if(isset($_SESSION['user'])){
        // Datos de la session
        $value=$_SESSION['user'];
?>

<html>
  <head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript" src="check.js"></script>
  </head>
  <body>
    <h1>Eureka!</h1>
      <a href="http://www.google.com">Google</a>
      <a href="http://www.yahoo.com">Yahoo</a>
      <a href="https://ykyuen.wordpress.com">Eureka!</a>
  </body>
</html>
<?php
    }
?>