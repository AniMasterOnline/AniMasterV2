<?php
$HOST = 'localhost';
$NOMUSUARI = 'animaster';
$CONTRASENYA = 'master';
$NOMBDD = 'Animaster';


// Create config.php
$myfile = fopen("config.php", "w") or die("Unable to open file!");
$txt = '<?php
    define("HOST","'.$HOST.'");
    define("NOMUSUARI","'.$NOMUSUARI.'");
    define("CONTRASENYA","'.$CONTRASENYA.'");
    define("NOMBDD","'.$NOMBDD.'");
    class connexio extends mysqli {
        public function __construct() {
            parent::__construct(HOST,NOMUSUARI,CONTRASENYA,NOMBDD);
            parent::query("SET NAMES \'utf8\'");
            if (mysqli_connect_error()) {
                die(\'Connect Error (\' . mysqli_connect_errno() . \') \'. mysqli_connect_error());
            }
        }
    }
?>';
fwrite($myfile, $txt);
fclose($myfile);
?>

