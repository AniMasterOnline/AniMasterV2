<?php
    require_once __DIR__."/../config.php";
    class Usuari{
        /*Atributs*/
        private $id_usuari;
        private $saldo;
        private $user;
        private $email;
        private $password;
        private $nom;
        private $cognom;
        private $dni;
        private $phone;
        private $adreça;
        private $pais;
        private $poble;
        private $provincia;
        private $postal;
        private $id_tipus;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db2 = $db->query("INSERT INTO Usuari(`saldo`, `user`, `email`, `password`, `nom`, `cognom`, `dni`, `phone`, `adreca`, `pais`, `poble`, `provincia`, `postal`, `id_tipus`) "
                    . "VALUES ('$this->saldo', '$this->user', '$this->email', '$this->password', '$this->nom', '$this->cognom', '$this->dni', '$this->phone', '$this->adreça', '$this->pais', '$this->poble', '$this->provincia', '$this->postal', '$this->id_tipus')");
            $db->close();
            return $db2;
        }
        public function modIdentity($id, $user, $nom, $cognom){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  nom='$nom', cognom='$cognom' WHERE id_usuari= '$id' AND user= '$user'");
            $db->close();
            return $result;
        }
        public function modPass($id, $user, $pass){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  password='$pass' WHERE id_usuari= '$id' AND user= '$user'");
            $db->close();
            return $result;
        }
        public function modPhone($id, $user, $phone){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  phone='$phone' WHERE id_usuari= '$id' AND user= '$user'");
            $db->close();
            return $result;
        }
        public function modEmail($id, $user, $email){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  email='$email' WHERE id_usuari= '$id' AND user= '$user'");
            $db->close();
            return $result;
        }
        public function modContact($id, $user, $adreca, $pais, $poble, $provincia, $postal){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  adreca='$adreca', pais='$pais', poble='$poble', provincia='$provincia', postal='$postal' WHERE id_usuari= '$id' AND user= '$user'");
            $db->close();
            return $result;
        }
        public function modsaldo($id, $user, $saldo){
            $db = new connexio();
            $result = $db->query("UPDATE Usuari SET  saldo='$saldo' WHERE id_usuari= '$id' AND user= '$user'");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Usuari where id_usuari = $var";
            $db->query($sql);
            return $result;
        }
        function verificar_login($user,$password){ 
            $db = new connexio();
            $sql = "SELECT * FROM Usuari WHERE user = '$user' and password = '$password'";
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
        function verificar_user($user){ 
            $db = new connexio();
            $sql = "SELECT * FROM Usuari WHERE user = '$user'";
            $query = $db->query($sql);
            $count = 0;
            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $count++;
                }
            } else {
                $count = 0;
            }
            $db->close();
            if($count == 1){
                return false;
            }else{
                return true;
            }
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
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Usuari;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Usuari = new Usuari($obj["id_usuari"],$obj["saldo"],$obj["user"],$obj["email"],$obj["password"],$obj["nom"],$obj["cognom"],$obj["dni"],$obj["phone"],$obj["adreça"],$obj["pais"], $obj["poble"], $obj["provincia"], $obj["postal"],$obj["id_tipus"]);
                //var_dump($Usuari);
                array_push($rtn, $Usuari);
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
            $this->id_usuari=0;
            $this->saldo = "";
            $this->user = "";
            $this->email = "";
            $this->password = "";
            $this->nom = "";
            $this->cognom = "";
            $this->dni = "";
            $this->phone = "";
            $this->adreça = "";
            $this->pais = "";
            $this->poble = "";
            $this->provincia = "";
            $this->postal = "";
            $this->id_tipus = "";
        }
        function __construct14($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15){
            $this->id_usuari=0;
            $this->saldo = $a2;
            $this->user = $a3;
            $this->email = $a4;
            $this->password = $a5;
            $this->nom = $a6;
            $this->cognom = $a7;
            $this->dni = $a8;
            $this->phone = $a9;
            $this->adreça = $a10;
            $this->pais = $a11;
            $this->poble = $a12;
            $this->provincia = $a13;
            $this->postal = $a14;
            $this->id_tipus = $a15;
        }
        function __construct15($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15){
            $this->id_usuari=$a1;
            $this->saldo = $a2;
            $this->user = $a3;
            $this->email = $a4;
            $this->password = $a5;
            $this->nom = $a6;
            $this->cognom = $a7;
            $this->dni = $a8;
            $this->phone = $a9;
            $this->adreça = $a10;
            $this->pais = $a11;
            $this->poble = $a12;
            $this->provincia = $a13;
            $this->postal = $a14;
            $this->id_tipus = $a15;
        }
           
        //METODES SET
        public function setId_Usuari($id_usuari) {
            $this->id_usuari = $id_usuari;
        }
        public function setSaldo($saldo) {
            $this->saldo = $saldo;
        }
        public function setUser($user) {
            $this->user = $user;
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
        public function setDni($dni) {
            $this->dni = $dni;
        }
        public function setPhone($phone) {
            $this->phone = $phone;
        }
        public function setAdreça($adreça) {
            $this->adreça = $adreça;
        }
        public function setId_Tipus($id_tipus) {
            $this->id_tipus = $id_tipus;
        }
        
        //METODES GET 
        public function getId_Usuari(){
            return $this->id_usuari;
        }
        public function getSaldo(){
            return $this->saldo;
        }
        public function getUser(){
            return $this->user;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getCognom(){
            return $this->cognom;
        }
        public function getDni(){
            return $this->dni;
        }
        public function getPhone(){
            return $this->phone;
        }
        public function getAdreça(){
            return $this->adreça;
        }
        public function getId_Tipus(){
            return $this->id_tipus;
        }
    }
?>