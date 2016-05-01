<?php
session_start();
if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];
        //var_dump($value);
}
$self = $_SERVER['PHP_SELF'];


if (strpos($self,"settings/")){
    if(!isset($_SESSION['user'])){
        header('Location: ../../login.php'); //Redireccion si no estas logeado [Settings].
    }
}
if (strpos($self,"admin/")){
    
    if(!isset($_SESSION['user'])){ 
        header('Location: ../login.php'); //Redireccion si no estas logeado [admin].
        
    }else if(isset($_SESSION['user'])){
        if($value['id_tipo'] == 0 ){
            //Welcome Admin!.
        }else{
            header('Location: ../index.php'); //Redireccion si estas logeado  pero no eres => [admin].
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular.min.js"></script>
        <script>
            function NotificationCenter($scope) {
                var permissionLevels = {};
                permissionLevels[notify.PERMISSION_GRANTED] = 0;
                permissionLevels[notify.PERMISSION_DEFAULT] = 1;
                permissionLevels[notify.PERMISSION_DENIED] = 2;
                $scope.isSupported = notify.isSupported;
                $scope.permissionLevel = permissionLevels[notify.permissionLevel()];
                $scope.getClassName = function() {
                    if ($scope.permissionLevel === 0) {
                        return "allowed"
                    } else if ($scope.permissionLevel === 1) {
                        return "default"
                    } else {
                        return "denied"
                    }
                }
                $scope.callback = function() {
                    console.log("test");
                }
                $scope.requestPermissions = function() {
                    notify.requestPermission(function() {
                        $scope.$apply($scope.permissionLevel = permissionLevels[notify.permissionLevel()]);
                    })
                }
            }
            function show() {
                notify.createNotification("AniMaster Online v2", {body:"Test", icon: "favicon.ico"});
            }
        </script>
        <?php
            $subtitle='| Animaster Online v2';
            echo '<title>'.$title.' '.$subtitle.'</title>';
                echo '<meta charset="UTF-8">';
                echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
                // Fonts
                echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">';
                echo '<link href="https://fonts.googleapis.com/css?family=Rokkitt:700,400" rel="stylesheet" type="text/css">';
            
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
                // Favicon
                echo '<link rel="shortcut icon" href="../favicon.ico">';
                
                //Plugins
                echo '<script src="../Public/plugins/bootstrap-notify-3.1.3/bootstrap-notify.js"></script>'; // Bootstrap-notify
                echo '<script src="../Public/plugins/HTML5-Desktop-Notifications/desktop-notify.js"></script>'; //Desktop notifications
                echo '<script src="../Public/plugins/Waves-0.7.5/waves.js"></script>'; //Waves js
                echo '<link href="../Public/plugins/Waves-0.7.5/waves.css" rel="stylesheet">'; //Waves css
				
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
                // Favicon
                echo '<link rel="shortcut icon" href="../../favicon.ico">';
                
                //Plugins
                echo '<script src="../../Public/plugins/bootstrap-notify-3.1.3/bootstrap-notify.js"></script>'; // Bootstrap-notify
                echo '<script src="../../Public/plugins/HTML5-Desktop-Notifications/desktop-notify.js"></script>'; //Desktop notifications
                echo '<script src="../../Public/plugins/Waves-0.7.5/waves.js"></script>'; //Waves js
                echo '<link href="../../Public/plugins/Waves-0.7.5/waves.css" rel="stylesheet">'; //Waves css
                
				
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
                
                // Favicon
                echo '<link rel="shortcut icon" href="favicon.ico">';
                
                //Plugins
                echo '<script src="Public/plugins/bootstrap-notify-3.1.3/bootstrap-notify.js"></script>'; // Bootstrap-notify
                echo '<script src="Public/plugins/HTML5-Desktop-Notifications/desktop-notify.js"></script>'; //Desktop notifications
                echo '<script src="Public/plugins/Waves-0.7.5/waves.js"></script>'; //Waves js
                echo '<link href="Public/plugins/Waves-0.7.5/waves.css" rel="stylesheet">'; //Waves css
            }
        ?>	
    </head>
    <body >
        
    <?php include "menu.php";?>
