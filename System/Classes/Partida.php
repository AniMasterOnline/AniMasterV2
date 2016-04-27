<?php
    require_once __DIR__."/../config.php";
    class Partida{
        /*Atributs*/
        private $id_partida;
        private $nombre;
        private $descripcion;
        private $imagen;
        private $anyo;
        private $nv_sobrenatural;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db2 = $db->query("INSERT INTO Partida(`nombre`, `descripcion`, `imagen`, `anyo`, `nv_sobrenatural`) "
                    . "VALUES ('$this->nombre', '$this->descripcion', '$this->imagen', '$this->anyo', '$this->nv_sobrenatural')");
            $db->close();
            return $db2;
        }
        public function modPartida($id,$nombre,$descripcion,$imagen,$anyo,$nv_sobrenatural){
            $db = new connexio();
            $result = $db->query("UPDATE Partida SET  nombre='$nombre', descripcion='$descripcion', imagen='$imagen', anyo='$anyo', nv_sobrenatural='$nv_sobrenatural' WHERE id_partida= '$id'");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Partida where id_partida = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Partida";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Partida = new Partida($obj["id_partida"],$obj["nombre"],$obj["descripcion"],$obj["imagen"],$obj["anyo"],$obj["nv_sobrenatural"]);
                //var_dump($Partida);
                array_push($rtn, $Partida);
            }
            $db->close();
            return $rtn;
        }
        
        public function view_par($id){
            $db = new connexio();
            $sql = "SELECT * FROM Partida where id_partida='$id'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Partida = new Partida($obj["nombre"],$obj["descripcion"],$obj["imagen"],$obj["anyo"],$obj["nv_sobrenatural"]);
                //var_dump($Partida);
                array_push($rtn, $Partida);
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
            $this->id_partida=0;
            $this->nombre = "";
            $this->descripcion = "";
            $this->imagen = "";
            $this->anyo = "";
            $this->nv_sobrenatural = "";
        }
        
        function __construct8($a2, $a3, $a4, $a5, $a6){
            $this->id_partida=0;
            $this->nombre = $a2;
            $this->descripcion = $a3;
            $this->imagen = $a4;
            $this->anyo = $a5;
            $this->nv_sobrenatural = $a6;
        }
        
        function __construct9($a1, $a2, $a3, $a4, $a5, $a6){
            $this->id_partida=$a1;
            $this->nombre = $a2;
            $this->descripcion = $a3;
            $this->imagen = $a4;
            $this->anyo = $a5;
            $this->nv_sobrenatural = $a6;
        }
           
        //METODES SET
        public function setId_Partida($id_partida) {
            $this->id_partida = $id_partida;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
        public function setAnyo($anyo) {
            $this->anyo = $anyo;
        }
        public function setNv_Sobrenatural($nv_sobrenatural) {
            $this->nv_sobrenatural = $nv_sobrenatural;
        }
        
        //METODES GET 
        public function getId_Partida($id_partida) {
            $this->id_partida = $id_partida;
        }
        public function getNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function getDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public function getImagen($imagen) {
            $this->imagen = $imagen;
        }
        public function getAnyo($anyo) {
            $this->anyo = $anyo;
        }
        public function getNv_Sobrenatural($nv_sobrenatural) {
            $this->nv_sobrenatural = $nv_sobrenatural;
        }
    }
?>