<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
            $subtitle='| Animaster Online v2';
            echo '<title>'.$title.' '.$subtitle.'</title>';
                echo '<meta charset="UTF-8">';
                echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
                // Fonts
                echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">';
                echo '<link href="https://fonts.googleapis.com/css?family=Rokkitt:700,400" rel="stylesheet" type="text/css">';
            
            $self = $_SERVER['PHP_SELF'];
            if (strpos($self,"admin/")) { // Admin 
                
                // FontAwesome
                echo '<LINK REL=StyleSheet HREF="../Public/font-awesome-4.6.1/css/font-awesome.min.css" TYPE="text/css" MEDIA=screen>';
                // Jquery
                echo '<script src="../Public/jquery/jquery-1.12.3.min.js"></script>';
                // Jquery ui CSS & Js
                echo '<link href="../Public/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet">';
                echo '<script src="../Public/jquery-ui-1.11.4/jquery-ui.min.js"></script>';
                // Bootstrap Core CSS & Js
                echo '<link href="../Public/bootstrap-3.3.6/css/bootstrap.css" rel="stylesheet">';
                echo '<script src="../Public/bootstrap-3.3.6/js/bootstrap.js"></script>';
                // Theme Css
                echo '<link href="../Public/css/theme.css" rel="stylesheet">';
                echo '<script src="../Public/js/template.js"></script>';
                echo '<script src="../Public/js/modernizr.js"></script>';
                echo '<script src="../Public/js/bootstrap-notify.js"></script>';
                // Favicon
                echo '<link rel="shortcut icon" href="../favicon.ico">';
				
            }else if (strpos($self,"settings/")) { //User
                
                // FontAwesome
                echo '<LINK REL=StyleSheet HREF="../../Public/font-awesome-4.6.1/css/font-awesome.min.css" TYPE="text/css" MEDIA=screen>';
                // Jquery
                echo '<script src="../../Public/jquery/jquery-1.12.3.min.js"></script>';
                // Jquery ui CSS & Js
                echo '<link href="../../Public/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet">';
                echo '<script src="../../Public/jquery-ui-1.11.4/jquery-ui.min.js"></script>';
                // Bootstrap Core CSS & Js
                echo '<link href="../../Public/bootstrap-3.3.6/css/bootstrap.css" rel="stylesheet">';
                echo '<script src="../../Public/bootstrap-3.3.6/js/bootstrap.js"></script>';
                // Theme Css
                echo '<link href="../../Public/css/theme.css" rel="stylesheet">';
                echo '<script src="../../Public/js/template.js"></script>';
                echo '<script src="../../Public/js/modernizr.js"></script>';
                echo '<script src="../../Public/js/bootstrap-notify.js"></script>';
                // Favicon
                echo '<link rel="shortcut icon" href="../../favicon.ico">';
                
				
            }else{ // Index
                
                // FontAwesome
                echo '<LINK REL=StyleSheet HREF="Public/font-awesome-4.6.1/css/font-awesome.min.css" TYPE="text/css" MEDIA=screen>';
                // Jquery
                echo '<script src="Public/jquery/jquery-1.12.3.min.js"></script>';
                // Jquery ui CSS & Js
                echo '<link href="Public/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet">';
                echo '<script src="Public/jquery-ui-1.11.4/jquery-ui.min.js"></script>';
                // Bootstrap Core CSS & Js
                echo '<link href="Public/bootstrap-3.3.6/css/bootstrap.css" rel="stylesheet">';
                echo '<script src="Public/bootstrap-3.3.6/js/bootstrap.js"></script>';
                // Theme Css
                echo '<link href="Public/css/theme.css" rel="stylesheet">';
                echo '<script src="Public/js/template.js"></script>';
                echo '<script src="Public/js/modernizr.js"></script>';
                echo '<script src="Public/js/bootstrap-notify.js"></script>';
                
                // Favicon
                echo '<link rel="shortcut icon" href="favicon.ico">';
                

            }
        ?>	
    </head>
    <body>
    <?php include "menu.php";?>
