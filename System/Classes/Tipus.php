<?php
    require_once __DIR__."/../config.php";
    class Tipus{
        /*Atributs*/
        private $id_tipus;
        private $rang;
        private $descripcio;
        
        //METODES
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Tipus;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Tipus = new Tipus($obj["id_tipus"],$obj["rang"],$obj["descripcio"]);
                //var_dump($Tipus);
                array_push($rtn, $Tipus);
            }
            $db->close();
            return $rtn;
        }
        //CONSTRUCTORS
        function __construct(){
            $args = func_get_args();
            $num = func_num_args();
            $f='__construct'. $num;
            if (method_exists($this, $f)) {
                call_user_func_array(array($this, $f), $args);
            }
        }
        function __construct0(){
            $this->id_tipus=0;
            $this->rang = "";
            $this->descripcio = "";
        }
        function __construct10($a2, $a3){
            $this->id_tipus=0;
            $this->rang = $a2;
            $this->descripcio = $a3;
        }
        function __construct11($a1, $a2, $a3){
            $this->id_tipus=$a1;
            $this->rang = $a2;
            $this->descripcio = $a3;
        }
           
        //METODES SET
        public function setId_Tipus($id_tipus) {
            $this->id_tipus = $id_tipus;
        }
        public function setRang($rang) {
            $this->rang = $rang;
        }
        public function setDescripcio($descripcio) {
            $this->descripcio = $descripcio;
        }
        
        //METODES GET 
        public function getId_Tipus(){
            return $this->id_tipus;
        }
        public function getRang(){
            return $this->rang;
        }
        public function getDescripcio(){
            return $this->descripcio;
        }
    }
?>

