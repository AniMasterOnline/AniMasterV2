<?php
    require_once __DIR__."/../config.php";
    class Partida_Usuari{
        /*Atributs*/
        private $id_usuario;
        private $id_partida;
        private $pos;
        
        //METODES
        public function add(){
            $db = new connexio();
            $result = $db->query("INSERT INTO Partida_Usuari(`id_usuario`, `id_partida`, `pos`) "
                    . "VALUES ('$this->id_usuario', '$this->id_partida', '$this->pos')");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Partida_Usuari where id_partida = $var";
            $db->query($sql);
            return $result;
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"]);
                //var_dump($Partida);
                array_push($rtn, $partida_usuari);
            }
            $db->close();
            return $rtn;
        }
        public function viewPos($id_usuario, $pos){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_usuario='$id_usuario' AND pos='$pos'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"]);
                }
                if($count == 1){
                    return $partida_usuari;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
        public function viewUsuari($id_usuario){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_usuario='$id_usuario' ORDER BY pos ASC";
            $query = $db->query($sql);
            $db->close();
            $rtn = array();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"]);
                    array_push($rtn, $partida_usuari);
                }
                return $rtn;
            }else{
                return null;
            }
        }
        public function viewPartida($id_partida){
            $db = new connexio();
            $sql = "SELECT * FROM Partida_Usuari where id_partida='$id_partida'";
            $query = $db->query($sql);
            $db->close();
            $count = 0;
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count++;
                    $partida_usuari = new Partida_Usuari($obj["id_usuario"],$obj["id_partida"],$obj["pos"]);
                }
                if($count == 1){
                    return $partida_usuari;
                }else{
                    return null;
                }
            }else{
                return null;
            }
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
            $this->id_usuario = 0;
            $this->id_partida = 0;
            $this->pos = 0;
        }
        
        function __construct3($a1, $a2, $a3){
            $this->id_usuario = $a1;
            $this->id_partida = $a2;
            $this->pos = $a3;
        }
           
        //METODES SET
        public function setId_Usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
        public function setId_Partida($id_partida) {
            $this->id_partida = $id_partida;
        }
        public function setPos($pos) {
            $this->pos = $pos;
        }
        
        //METODES GET 
        public function getId_Usuario() {
            return $this->id_usuario;
        }
        public function getId_Partida() {
            return $this->id_partida;
        }
        public function getPos() {
            return $this->pos;
        }
    }
?>