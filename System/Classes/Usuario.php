<?php
    require_once __DIR__."/../config.php";
    class Usuario{
        /*Atributs*/
        private $id_usuario;
        private $nickname;
        private $email;
        private $password;
        private $nombre;
        private $apellido;
        private $telefono;
        private $id_tipo;
        private $imagen;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db2 = $db->query("INSERT INTO Usuario(`nickname`, `email`, `password`, `id_tipo`) "
                    . "VALUES ('$this->nickname', '$this->email', '$this->password', '$this->id_tipo')");
            $db->close();
            return $db2;
        }
        public function modIdentity($id, $nickname, $nombre, $apellido){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  nombre='$nombre', apellido='$apellido' WHERE id_usuario= '$id' AND nickname= '$nickname'");
            $db->close();
            return $result;
        }
        public function modPass($id, $nickname, $pass){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  password='$pass' WHERE id_usuario= '$id' AND nickname= '$nickname'");
            $db->close();
            return $result;
        }
        public function modPhone($id, $nickname, $telefono){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  telefono='$telefono' WHERE id_usuario= '$id' AND nickname= '$nickname'");
            $db->close();
            return $result;
        }
        public function modImage($id, $nickname, $imagen){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  imagen='$imagen' WHERE id_usuario= '$id' AND nickname= '$nickname'");
            $db->close();
            return $result;
        }
        public function modEmail($id, $nickname, $email){
            $db = new connexio();
            $result = $db->query("UPDATE Usuario SET  email='$email', nickname='$nickname' WHERE id_usuario= '$id'");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Usuario where id_usuario = $var";
            $db->query($sql);
            return $result;
        }
        
        function verificar_login($nickname,$password){ 
            $db = new connexio();
            $sql = "SELECT * FROM Usuario WHERE nickname = '$nickname' and password = '$password'";
            $query = $db->query($sql);
            $count = 0;
            $datos = "";
            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $count++;
                    $datos = $row;
                }
            } else {
                $count = 0;
            }
            $db->close();
            if($count == 1){
                return $datos;
            }else{
                return null;
            }
        }
        
        function return_nickname($id){ 
            $db = new connexio();
            $sql = "SELECT * FROM Usuario WHERE id_usuario = '$id'";
            $query = $db->query($sql);
            $count = 0;
            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $count++;
                    $datos = $row;
                }
            } else {
                $count = 0;
            }
            $db->close();
            if($count == 1){
                return $datos;
            }else{
                return "error";
            }
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Usuario;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Usuario = new Usuario($obj["id_usuario"],$obj["nickname"],$obj["email"],$obj["password"],$obj["nombre"],$obj["apellido"],$obj["telefono"],$obj["id_tipo"],$obj["imagen"]);
                //var_dump($Usuario);
                array_push($rtn, $Usuario);
            }
            $db->close();
            return $rtn;
        }
        
        public function view_comp($id){
            $db = new connexio();
            $sql = "SELECT * FROM Usuario where id_usuario='$id'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Usuario = new Usuario($obj["nickname"],$obj["email"],$obj["password"],$obj["nombre"],$obj["apellido"],$obj["telefono"],$obj["id_tipo"],$obj["imagen"]);
                //var_dump($Usuario);
                array_push($rtn, $Usuario);
            }
            $db->close();
            return $rtn;
        }
        
         function return_user($id){ 
            $db = new connexio();
            $sql = "SELECT * FROM Usuario WHERE id_usuario = '$id'";
            $query = $db->query($sql);
            $count = 0;
            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $count++;
                    $datos = $row;
                }
            } else {
                $count = 0;
            }
            $db->close();
            if($count == 1){
                return $datos;
            }else{
                return "error";
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
            $this->id_usuario=0;
            $this->nickname = "";
            $this->email = "";
            $this->password = "";
            $this->nombre = "";
            $this->apellido = "";
            $this->telefono = "";
            $this->id_tipo = "";
            $this->imagen = "";
        }
        
        function __construct4($a2, $a3, $a4, $a8){
            $this->id_usuario=0;
            $this->nickname = $a2;
            $this->email = $a3;
            $this->password = $a4;
            $this->nombre = "";
            $this->apellido = "";
            $this->telefono = "";
            $this->id_tipo = $a8;
            $this->imagen = ""; 
        }
        
        function __construct8($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9){
            $this->id_usuario=0;
            $this->nickname = $a2;
            $this->email = $a3;
            $this->password = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->telefono = $a7;
            $this->id_tipo = $a8;
            $this->imagen = $a9; 
        }
        
        function __construct9($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9){
            $this->id_usuario=$a1;
            $this->nickname = $a2;
            $this->email = $a3;
            $this->password = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->telefono = $a7;
            $this->id_tipo = $a8;
            $this->imagen = $a9;
        }
           
        //METODES SET
        public function setId_Usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
        public function setNickname($nickname) {
            $this->nickname = $nickname;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setTelefon($telefono) {
            $this->telefono = $telefono;
        }
        public function setId_Tipo($id_tipo) {
            $this->id_tipo = $id_tipo;
        }
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
        
        //METODES GET 
        public function getId_Usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
        public function getNickname($nickname) {
            $this->nickname = $nickname;
        }
        public function getEmail($email) {
            $this->email = $email;
        }
        public function getPassword($password) {
            $this->password = $password;
        }
        public function getNom($nombre) {
            $this->nombre = $nombre;
        }
        public function getCognombre($apellido) {
            $this->apellido = $apellido;
        }
        public function getTelefon($telefono) {
            $this->telefono = $telefono;
        }
        public function getId_Tipus($id_tipo) {
            $this->id_tipo = $id_tipo;
        }
        public function getImatge($imagen) {
            $this->imagen = $imagen;
        }
    }
?>