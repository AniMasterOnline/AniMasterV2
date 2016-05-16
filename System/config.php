<?php
/**
* Definicio de les constants, que usem per a fer la conexio amb la BD.
*/
    //setup php for working with Unicode data
    mb_internal_encoding('UTF-8');
    mb_http_output('UTF-8');
    mb_http_input('UTF-8');
    mb_language('uni');
    mb_regex_encoding('UTF-8');
    ob_start('mb_output_handler');
    

    define("HOST","localhost");
    define("NOMUSUARI","animaster");
    define("CONTRASENYA","master");
    define("NOMBDD","Animaster");
    

    class connexio extends mysqli {
        public function __construct() {
        parent::__construct(HOST,NOMUSUARI,CONTRASENYA,NOMBDD);
        parent::query("SET NAMES 'utf8'");
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }
    }
}
?>
