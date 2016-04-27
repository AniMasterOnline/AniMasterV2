<?php
    require_once __DIR__."/../config.php";
    class Usuari{
        /*Atributs*/
        private $id_usuari;
        private $nickname;
        private $email;
        private $password;
        private $nom;
        private $cognom;
        private $telefon;
        private $id_tipus;
        private $imatge;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db2 = $db->query("INSERT INTO Usuari(`nickname`, `email`, `password`, `id_tipus`) "
                    . "VALUES ('$this->nickname', '$this->email', '$this->password', '$this->id_tipus')");
            $db->close();
            return $db2;
        }
        public function modIdentity($id, $nickname, $nom, $cognom){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  nom='$nom', cognom='$cognom' WHERE id_usuari= '$id' AND nickname= '$nickname'");
            $db->close();
            return $result;
        }
        public function modPass($id, $nickname, $pass){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  password='$pass' WHERE id_usuari= '$id' AND nickname= '$nickname'");
            $db->close();
            return $result;
        }
        public function modPhone($id, $nickname, $telefon){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  telefon='$telefon' WHERE id_usuari= '$id' AND nickname= '$nickname'");
            $db->close();
            return $result;
        }
        public function modImage($id, $nickname, $imatge){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  imatge='$imatge' WHERE id_usuari= '$id' AND nickname= '$nickname'");
            $db->close();
            return $result;
        }
        public function modEmail($id, $nickname, $email){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  email='$email' WHERE id_usuari= '$id' AND nickname= '$nickname'");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Usuari where id_usuari = $var";
            $db->query($sql);
            return $result;
        }
        
        function verificar_login($nickname,$password){ 
            $db = new connexio();
            $sql = "SELECT * FROM Usuari WHERE nickname = '$nickname' and password = '$password'";
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
            $sql = "SELECT * FROM Usuari WHERE id_usuari = '$id'";
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
            $sql = "SELECT * FROM Usuari;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Usuari = new Usuari($obj["id_usuari"],$obj["nickname"],$obj["email"],$obj["password"],$obj["nom"],$obj["cognom"],$obj["telefon"],$obj["id_tipus"],$obj["imatge"]);
                //var_dump($Usuari);
                array_push($rtn, $Usuari);
            }
            $db->close();
            return $rtn;
        }
        
        public function view_comp($id){
            $db = new connexio();
            $sql = "SELECT * FROM Usuari where id_usuari='$id'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Usuari = new Usuari($obj["nickname"],$obj["email"],$obj["password"],$obj["nom"],$obj["cognom"],$obj["telefon"],$obj["id_tipus"],$obj["imatge"]);
                //var_dump($Usuari);
                array_push($rtn, $Usuari);
            }
            $db->close();
            return $rtn;
        }
        
         function return_user($id){ 
            $db = new connexio();
            $sql = "SELECT * FROM Usuari WHERE id_usuari = '$id'";
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
            $this->id_usuari=0;
            $this->nickname = "";
            $this->email = "";
            $this->password = "";
            $this->nom = "";
            $this->cognom = "";
            $this->telefon = "";
            $this->id_tipus = "";
            $this->imatge = "";
        }
        
        function __construct4($a2, $a3, $a4, $a8){
            $this->id_usuari=0;
            $this->nickname = $a2;
            $this->email = $a3;
            $this->password = $a4;
            $this->nom = "";
            $this->cognom = "";
            $this->telefon = "";
            $this->id_tipus = $a8;
            $this->imatge = ""; 
        }
        
        function __construct8($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9){
            $this->id_usuari=0;
            $this->nickname = $a2;
            $this->email = $a3;
            $this->password = $a4;
            $this->nom = $a5;
            $this->cognom = $a6;
            $this->telefon = $a7;
            $this->id_tipus = $a8;
            $this->imatge = $a9; 
        }
        
        function __construct9($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9){
            $this->id_usuari=$a1;
            $this->nickname = $a2;
            $this->email = $a3;
            $this->password = $a4;
            $this->nom = $a5;
            $this->cognom = $a6;
            $this->telefon = $a7;
            $this->id_tipus = $a8;
            $this->imatge = $a9;
        }
           
        //METODES SET
        public function setId_Usuari($id_usuari) {
            $this->id_usuari = $id_usuari;
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
        public function setNom($nom) {
            $this->nom = $nom;
        }
        public function setCognom($cognom) {
            $this->cognom = $cognom;
        }
        public function setTelefon($telefon) {
            $this->telefon = $telefon;
        }
        public function setId_Tipus($id_tipus) {
            $this->id_tipus = $id_tipus;
        }
        public function setImatge($imatge) {
            $this->imatge = $imatge;
        }
        
        //METODES GET 
        public function getId_Usuari($id_usuari) {
            $this->id_usuari = $id_usuari;
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
        public function getNom($nom) {
            $this->nom = $nom;
        }
        public function getCognom($cognom) {
            $this->cognom = $cognom;
        }
        public function getTelefon($telefon) {
            $this->telefon = $telefon;
        }
        public function getId_Tipus($id_tipus) {
            $this->id_tipus = $id_tipus;
        }
        public function getImatge($imatge) {
            $this->imatge = $imatge;
        }
    }
?>