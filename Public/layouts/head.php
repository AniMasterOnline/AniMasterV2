<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
$self = $_SERVER['PHP_SELF']; // $self --> Lugar actual visitado


/*
 Session expired
 * 
$timeout = 15;//segundos que session no se disconecta
if(isset($_SESSION['user'])) {
if(isset($_SESSION['timeout'])) {
    $duration = time() - (int)$_SESSION['timeout'];
    if($duration > $timeout) {
        echo "<script>alert('Session expired!');</script>";
        session_destroy();
        echo "<script> window.open('".$self."','_self');</script>";
    }
}
}
$_SESSION['timeout'] = time();*/

/*
 * $value --> Login Session.
 */
if(isset($_SESSION['user'])){
        $value=$_SESSION['user'];
        //var_dump($value);
}

/*
 * $url --> Login redirect.
 */
if (strpos($self,"login.php")){
    if(isset($_SESSION['url'])){
        $url = $_SESSION['url']; // Guarda la $url del ultimo sitio visitado
    }else{
        $url = "settings/account/"; // Si no hay un sitio visitado redirije a /settings/account/
    }
}else if (strpos($self,"AniMasterV2/index.php")){
    //  --> /no redirect here/ <--
    if(isset($_SESSION['url'])){
        unset($_SESSION['url']); // Unset session $url enInicio
    }
}else{
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    if(isset($_SESSION['url'])){
            $url=$_SESSION['url']; // Recoje el resto de lugares al que redirijir
    }
}

/*
 * Redirecciones
 */
if (strpos($self,"settings/")){
    if(!isset($_SESSION['user'])){
        header('Location: ../../login.php'); //Redireccion si no estas logeado [Settings]
    }
}
if (strpos($self,"admin/")){
    
    if(!isset($_SESSION['user'])){ 
        header('Location: ../login.php'); //Redireccion si no estas logeado [admin]
        
    }else if(isset($_SESSION['user'])){
        if($value['id_tipo'] == 0 ){
            //Welcome Admin!.
        }else{
            header('Location: ../index.php'); //Redireccion si estas logeado  pero no eres => [admin]
        }
    }
}
if (strpos($self,"login.php")){
    if(isset($_SESSION['user'])){ 
        header('Location: settings/'); //Redireccion si estas logeado --> settings
    }
}
if (strpos($self,"signup.php")){
    if(isset($_SESSION['user'])){ 
        header('Location: settings/'); //Redireccion si estas logeado --> settings
    }
}
if (strpos($self,"logout.php")){
    if(!isset($_SESSION['user'])){ 
        header('Location: index.php'); //Redireccion si  no estas logeado --> index
    }
}
if (strpos($self,"zone.php")){
    if(!isset($_SESSION['user'])){ 
        header('Location: login.php'); //Redireccion si no estas logeado --> Login
    }
}
?>
<!-- Inicio de la pagina -->
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
                        return "allowed";
                    } else if ($scope.permissionLevel === 1) {
                        return "default";
                    } else {
                        return "denied";
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
            function DesktopNotifyshow($title, $body, $icon) {
                notify.createNotification($title, {body:$body, icon: $icon});
            }
        </script>
        <?php
            $subtitle='| Animaster Online v2';
            echo '<title>'.$title.' '.$subtitle.'</title>';
                echo '<meta charset="UTF-8">';
                echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">';
                // Fonts
                echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">';
                echo '<link href="https://fonts.googleapis.com/css?family=Rokkitt:700,400" rel="stylesheet" type="text/css">';
            
            if (strpos($self,"admin/")) { // Admin 
                // FontAwesome
                echo '<LINK REL=StyleSheet HREF="../Public/font-awesome-4.6.1/css/font-awesome.min.css" TYPE="text/css" MEDIA=screen>';
                // material Design Iconic Font
                echo '<LINK REL=StyleSheet HREF="../Public/material-design-iconic-font/css/material-design-iconic-font.css" TYPE="text/css" MEDIA=screen>';
                // Jquery
                echo '<script src="../Public/jquery/jquery-1.12.3.min.js"></script>';
                // Jquery ui CSS & Js
                echo '<link href="../Public/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet">';
                echo '<script src="../Public/jquery-ui-1.11.4/jquery-ui.min.js"></script>';
                // Bootstrap Core CSS & Js
                echo '<link href="../Public/bootstrap-3.3.6/css/bootstrap.css" rel="stylesheet">';
                echo '<script src="../Public/bootstrap-3.3.6/js/bootstrap.js"></script>';
                //Plugins
                echo '<script src="../Public/plugins/bootstrap-notify-3.1.3/bootstrap-notify.js"></script>'; // Bootstrap-notify
                echo '<script src="../Public/plugins/HTML5-Desktop-Notifications/desktop-notify.js"></script>'; //Desktop notifications
                echo '<script src="../Public/plugins/Waves-0.7.5/waves.js"></script>'; //Waves js
                echo '<link href="../Public/plugins/Waves-0.7.5/waves.css" rel="stylesheet">'; //Waves css
                echo '<script src="../Public/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>'; //Waves js
                echo '<link href="../Public/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css" rel="stylesheet">'; //Waves css
                echo '<script src="../Public/plugins/bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>'; //SweetAlert js
                echo '<link href="../Public/plugins/bootstrap-sweetalert-master/dist/sweetalert.css" rel="stylesheet">'; //SweetAlert css
                echo '<script src="../Public/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.js"></script>'; //bootstrap-select js
                echo '<link href="../Public/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.css" rel="stylesheet">'; //bootstrap-select css
                
                // Theme Css --> Important!
                echo '<link href="../Public/css/theme.css" rel="stylesheet">';
                echo '<script src="../Public/js/template.js"></script>';
                // Favicon
                echo '<link rel="shortcut icon" href="../favicon.ico">';
				
            }else if (strpos($self,"settings/")) { //User
                // FontAwesome
                echo '<LINK REL=StyleSheet HREF="../../Public/font-awesome-4.6.1/css/font-awesome.min.css" TYPE="text/css" MEDIA=screen>';
                // material Design Iconic Font
                echo '<LINK REL=StyleSheet HREF="../../Public/material-design-iconic-font/css/material-design-iconic-font.css" TYPE="text/css" MEDIA=screen>';
                // Jquery
                echo '<script src="../../Public/jquery/jquery-1.12.3.min.js"></script>';
                // Jquery ui CSS & Js
                echo '<link href="../../Public/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet">';
                echo '<script src="../../Public/jquery-ui-1.11.4/jquery-ui.min.js"></script>';
                // Bootstrap Core CSS & Js
                echo '<link href="../../Public/bootstrap-3.3.6/css/bootstrap.css" rel="stylesheet">';
                echo '<script src="../../Public/bootstrap-3.3.6/js/bootstrap.js"></script>';
                //Plugins
                echo '<script src="../../Public/plugins/bootstrap-notify-3.1.3/bootstrap-notify.js"></script>'; // Bootstrap-notify
                echo '<script src="../../Public/plugins/HTML5-Desktop-Notifications/desktop-notify.js"></script>'; //Desktop notifications
                echo '<script src="../../Public/plugins/Waves-0.7.5/waves.js"></script>'; //Waves js
                echo '<link href="../../Public/plugins/Waves-0.7.5/waves.css" rel="stylesheet">'; //Waves css
                echo '<script src="../../Public/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>'; //Waves js
                echo '<link href="../../Public/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css" rel="stylesheet">'; //Waves css
                echo '<script src="../../Public/plugins/bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>'; //SweetAlert js
                echo '<link href="../../Public/plugins/bootstrap-sweetalert-master/dist/sweetalert.css" rel="stylesheet">'; //SweetAlert css
                echo '<script src="../../Public/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.js"></script>'; //bootstrap-select js
                echo '<link href="../../Public/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.css" rel="stylesheet">'; //bootstrap-select css
                
                // Theme Css --> Important!
                echo '<link href="../../Public/css/theme.css" rel="stylesheet">';
                echo '<script src="../../Public/js/template.js"></script>';
                // Favicon
                echo '<link rel="shortcut icon" href="../../favicon.ico">';
		
				
            }else{ // Index
                
                // FontAwesome
                echo '<LINK REL=StyleSheet HREF="Public/font-awesome-4.6.1/css/font-awesome.min.css" TYPE="text/css" MEDIA=screen>';
                // material Design Iconic Font
                echo '<LINK REL=StyleSheet HREF="Public/material-design-iconic-font/css/material-design-iconic-font.css" TYPE="text/css" MEDIA=screen>';
                // Jquery
                echo '<script src="Public/jquery/jquery-1.12.3.min.js"></script>';
                // Jquery ui CSS & Js
                echo '<link href="Public/jquery-ui-1.11.4/jquery-ui.min.css" rel="stylesheet">';
                echo '<script src="Public/jquery-ui-1.11.4/jquery-ui.min.js"></script>';
                // Bootstrap Core CSS & Js
                echo '<link href="Public/bootstrap-3.3.6/css/bootstrap.css" rel="stylesheet">';
                echo '<script src="Public/bootstrap-3.3.6/js/bootstrap.js"></script>';
                //Plugins
                echo '<script src="Public/plugins/bootstrap-notify-3.1.3/bootstrap-notify.js"></script>'; // Bootstrap-notify
                echo '<script src="Public/plugins/HTML5-Desktop-Notifications/desktop-notify.js"></script>'; //Desktop notifications
                echo '<script src="Public/plugins/Waves-0.7.5/waves.js"></script>'; //Waves js
                echo '<link href="Public/plugins/Waves-0.7.5/waves.css" rel="stylesheet">'; //Waves css
                echo '<script src="Public/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>'; //Waves js
                echo '<link href="Public/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css" rel="stylesheet">'; //Waves css
                echo '<script src="Public/plugins/bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>'; //SweetAlert js
                echo '<link href="Public/plugins/bootstrap-sweetalert-master/dist/sweetalert.css" rel="stylesheet">'; //SweetAlert css
                echo '<script src="Public/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.js"></script>'; //bootstrap-select js
                echo '<link href="Public/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.css" rel="stylesheet">'; //bootstrap-select css
                
                // Theme Css --> Important!
                echo '<link href="Public/css/theme.css" rel="stylesheet">';
                echo '<script src="Public/js/template.js"></script>';
                // Favicon
                echo '<link rel="shortcut icon" href="favicon.ico">';
            }
        ?>	
    </head>
    <body class="customcontentbody">
        <div class="page-loader bgm-white">
            <div class="preloader pls-blue">
                <svg class="pl-circular " viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20"></circle>
                </svg>
                <p>Please wait...</p>
            </div>
        </div>
    <?php 
        include "menu.php";
    ?>
