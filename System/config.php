<?php
/**
* Definicio de les constants, que usem per a fer la conexio amb la BD.
*/
    define("HOST","localhost");
    define("NOMUSUARI","subweb");
    define("CONTRASENYA","master");
    define("NOMBDD","db_subweb");

    class connexio extends mysqli {
        public function __construct() {
        parent::__construct(HOST,NOMUSUARI,CONTRASENYA,NOMBDD);
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());        }
    }
}
?>
