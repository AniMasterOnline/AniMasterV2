<?php
    require_once __DIR__."/../config.php";
    class Personaje{
        /*Atributs*/
        private $id_personaje;
        private $id_usuario;
        private $id_partida;
        private $id_categoria;
        private $nombre;
        private $apellido;
        private $edad;
        private $nivel;
        private $turno;
        private $puntos_vida;
        private $sexo;
        private $raza;
        private $pelo;
        private $ojos;
        private $altura;
        private $peso;
        private $apariencia;
        private $tamanyo;
        private $exp_actual;
        private $c_AGI;
        private $c_CON;
        private $c_DES;
        private $c_FUE;
        private $c_INT;
        private $c_PER;
        private $c_POD;
        private $c_VOL;
        private $nacionalidad;
        private $imagen;
        private $humano;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db2 = $db->query("INSERT INTO Personaje(`id_usuario`, `id_categoria`, `password`, `nivel`) "
                    . "VALUES ('$this->id_usuario', '$this->id_categoria', '$this->password', '$this->nivel')");
            $db->close();
            return $db2;
        }
        public function modIdentity($id, $nombre, $apellido){
            $db = new connexio();
            $result = $db->query("UPDATE Personaje SET  nombre='$nombre', apellido='$apellido' WHERE id_personaje= '$id'");
            $db->close();
            return $result;
        }
        public function modPass($id, $pass){
            $db = new connexio();
            $result = $db->query("UPDATE Personaje SET  password='$pass' WHERE id_personaje= '$id'");
            $db->close();
            return $result;
        }
        public function modPhone($id, $edad){
            $db = new connexio();
            $result = $db->query("UPDATE Personaje SET  edad='$edad' WHERE id_personaje= '$id'");
            $db->close();
            return $result;
        }
        public function modImage($id, $turno){
            $db = new connexio();
            $result = $db->query("UPDATE Personaje SET  turno='$turno' WHERE id_personaje= '$id'");
            $db->close();
            return $result;
        }
        public function modEmail($id, $id_categoria){
            $db = new connexio();
            $result = $db->query("UPDATE Personaje SET  id_categoria='$id_categoria' WHERE id_personaje= '$id'");
            $db->close();
            return $result;
        }
        public function modNickname($id, $id_usuario){
            $db = new connexio();
            $result = $db->query("UPDATE Personaje SET  id_usuario='$id_usuario' WHERE id_personaje= '$id'");
            $db->close();
            return $result;
        }
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje where id_personaje = $var";
            $db->query($sql);
            return $result;
        }
        
        public function userflag($id, $id_usuario){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_usuario = '$id_usuario' and id_personaje= '$id'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                return 'yes';
            } else {
                return 'no';
            }
        }
        public function userexiste($id_usuario){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_usuario = '$id_usuario'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                return 'yes';
            } else {
                return 'no';
            }
        }
        
        public function mailflag($id, $id_categoria){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_categoria = '$id_categoria' and id_personaje= '$id'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                return 'yes';
            } else {
                return 'no';
            }
        }
        public function mailexiste($id_categoria){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_categoria = '$id_categoria'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                return 'yes';
            } else {
                return 'no';
            }
        }
        
        public function verificar_login($id_usuario,$password){ 
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_usuario = '$id_usuario' and password = '$password'";
            $query = $db->query($sql);
            $count = 0;
            $datos = 0;
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
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Personaje = new Personaje($obj["id_personaje"],$obj["id_usuario"],$obj["id_categoria"],$obj["password"],$obj["nombre"],$obj["apellido"],$obj["edad"],$obj["nivel"],$obj["turno"]);
                //var_dump($Personaje);
                array_push($rtn, $Personaje);
            }
            $db->close();
            return $rtn;
        }
        public function view_comp($id){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje where id_personaje='$id'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Personaje = new Personaje($obj["id_usuario"],$obj["id_categoria"],$obj["password"],$obj["nombre"],$obj["apellido"],$obj["edad"],$obj["nivel"],$obj["turno"]);
                //var_dump($Personaje);
                array_push($rtn, $Personaje);
            }
            $db->close();
            return $rtn;
        }
        public function return_user($id){ 
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_personaje = '$id'";
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
        
        public function modNum_Partidas($id, $puntos_vida){
            $db = new connexio();
            $result = $db->query("UPDATE Personaje SET  puntos_vida='$puntos_vida' WHERE id_personaje= '$id'");
            $db->close();
            return $result;
        }
        public function returnNum_Partidas($id_personaje){ 
            $db = new connexio();
            $sql = "SELECT puntos_vida FROM Personaje WHERE id_personaje='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                while($obj = $query->fetch_assoc()){
                    $count = $obj["puntos_vida"];
                }
                return $count;
            }else{
                return null;
            }
        }
        public function viewPersonajesPartida($id){ 
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_partida = '$id'";
            $query = $db->query($sql);
            $count = 0;
            $datos = array();
            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $count++;
                    array_push($datos, $row);
                }
            } else {
                $count = 0;
            }
            $db->close();
            if($count >= 1){
                //var_dump($datos);
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
            $this->id_personaje=0;
            $this->id_usuario = 0;
            $this->id_partida = 0;
            $this->id_categoria = 0;
            $this->nombre = 0;
            $this->apellido = 0;
            $this->edad = 0;
            $this->nivel = 0;
            $this->turno = 0; 
            $this->puntos_vida = 0; 
            $this->sexo = 0; 
            $this->raza = 0; 
            $this->pelo = 0; 
            $this->ojos = 0; 
            $this->altura = 0; 
            $this->peso = 0; 
            $this->apariencia = 0; 
            $this->tamanyo = 0; 
            $this->exp_actual = 0; 
            $this->c_AGI = 0; 
            $this->c_CON = 0; 
            $this->c_DES = 0; 
            $this->c_FUE = 0; 
            $this->c_INT = 0; 
            $this->c_PER = 0;
            $this->c_POD = 0;
            $this->c_VOL = 0; 
            $this->nacionalidad = 0; 
            $this->imagen = 0; 
            $this->humano = 0; 
        }
        
        function __construct28($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23, $a24, $a25, $a26, $a27, $a28, $a29){
            $this->id_personaje="";
            $this->id_usuario = $a2;
            $this->id_categoria = $a3;
            $this->nombre = $a4;
            $this->apellido = $a5;
            $this->edad = $a6;
            $this->nivel = $a7;
            $this->turno = $a8; 
            $this->puntos_vida = $a9; 
            $this->sexo = $a10; 
            $this->raza = $a11; 
            $this->pelo = $a12; 
            $this->ojos = $a13; 
            $this->altura = $a14; 
            $this->peso = $a15; 
            $this->apariencia = $a16; 
            $this->tamanyo = $a17; 
            $this->exp_actual = $a18; 
            $this->c_AGI = $a19; 
            $this->c_CON = $a20; 
            $this->c_DES = $a21; 
            $this->c_FUE = $a22; 
            $this->c_INT = $a23; 
            $this->c_PER = $a24;
            $this->c_POD = $a25;
            $this->c_VOL = $a26; 
            $this->nacionalidad = $a27; 
            $this->imagen = $a28; 
            $this->humano = $a29; 
        }
        
        function __construct29($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23, $a24, $a25, $a26, $a27, $a28, $a29){
            $this->id_personaje=$a1;
            $this->id_usuario = $a2;
            $this->id_categoria = $a3;
            $this->nombre = $a4;
            $this->apellido = $a5;
            $this->edad = $a6;
            $this->nivel = $a7;
            $this->turno = $a8; 
            $this->puntos_vida = $a9; 
            $this->sexo = $a10; 
            $this->raza = $a11; 
            $this->pelo = $a12; 
            $this->ojos = $a13; 
            $this->altura = $a14; 
            $this->peso = $a15; 
            $this->apariencia = $a16; 
            $this->tamanyo = $a17; 
            $this->exp_actual = $a18; 
            $this->c_AGI = $a19; 
            $this->c_CON = $a20; 
            $this->c_DES = $a21; 
            $this->c_FUE = $a22; 
            $this->c_INT = $a23; 
            $this->c_PER = $a24;
            $this->c_POD = $a25;
            $this->c_VOL = $a26; 
            $this->nacionalidad = $a27; 
            $this->imagen = $a28; 
            $this->humano = $a29; 
        }
           
        //METODES SET
        public function setId_Personaje($id_personaje) {
            $this->id_personaje = $id_personaje;
        }
        public function setId_Usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }
        public function setId_Categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setEdad($edad) {
            $this->edad = $edad;
        }
        public function setNivel($nivel) {
            $this->nivel = $nivel;
        }
        public function setTurno($turno) {
            $this->turno = $turno;
        }
        public function setPuntos_Vida($puntos_vida) {
            $this->puntos_vida = $puntos_vida;
        }
        public function setSexo($sexo) {
            $this->sexo = $sexo;
        }
        public function setRaza($raza) {
            $this->raza = $raza;
        }
        public function setPelo($pelo) {
            $this->pelo = $pelo;
        }
        public function setOjos($ojos) {
            $this->ojos = $ojos;
        }
        public function setAltura($altura) {
            $this->altura = $altura;
        }
        public function setPeso($peso) {
            $this->peso = $peso;
        }
        public function setApariencia($apariencia) {
            $this->apariencia = $apariencia;
        }
        public function setTamanyo($tamanyo) {
            $this->tamanyo = $tamanyo;
        }
        public function setExp_Actual($exp_actual) {
            $this->exp_actual = $exp_actual;
        }
        public function setC_AGI($c_AGI) {
            $this->c_AGI = $c_AGI;
        }
        public function setC_CON($c_CON) {
            $this->c_CON = $c_CON;
        }
        public function setC_DES($c_DES) {
            $this->c_DES = $c_DES;
        }
        public function setC_FUE($c_FUE) {
            $this->c_FUE = $c_FUE;
        }
        public function setC_INT($c_INT) {
            $this->c_INT = $c_INT;
        }
        public function setC_PER($c_PER) {
            $this->c_PER = $c_PER;
        }
        public function setC_POD($c_POD) {
            $this->c_POD = $c_POD;
        }
        public function setC_VOl($c_VOl) {
            $this->c_VOL = $c_VOl;
        }
        public function setNacionalidad($nacionalidad) {
            $this->nacionalidad = $nacionalidad;
        }
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
        public function setHumano($humano) {
            $this->humano = $humano;
        }
        
        //METODES GET 
        public function getId_Personaje() {
            return $this->id_personaje;
        }
        public function getId_Usuario() {
            return $this->id_usuario;
        }
        public function getId_Partida() {
            return $this->id_partida;
        }
        public function getId_Categoria() {
            return $this->id_categoria;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getEdad() {
            return $this->edad;
        }
        public function getNivel() {
            return $this->nivel;
        }
        public function getTurno() {
            return $this->turno;
        }
        public function getPuntos_Vida() {
            return $this->puntos_vida;
        }
        public function getSexo() {
            return $this->sexo;
        }
        public function getRaza() {
            return $this->raza;
        }
        public function getPelo() {
            return $this->pelo;
        }
        public function getOjos() {
            return $this->ojos;
        }
        public function getAltura() {
            return $this->altura;
        }
        public function getPeso() {
            return $this->peso;
        }
        public function getApariencia() {
            return $this->apariencia;
        }
        public function getTamanyo() {
            return $this->tamanyo;
        }
        public function getExp_Actual() {
            return $this->exp_actual;
        }
        public function getC_AGI() {
            return $this->c_AGI;
        }
        public function getC_CON() {
            return $this->c_CON;
        }
        public function getC_DES() {
            return $this->c_DES;
        }
        public function getC_FUE() {
            return $this->c_FUE;
        }
        public function getC_INT() {
            return $this->c_INT;
        }
        public function getC_PER() {
            return $this->c_PER;
        }
        public function getC_POD() {
            return $this->c_POD;
        }
        public function getC_VOL() {
            return $this->c_VOL;
        }
        public function getNacionalidad() {
            return $this->nacionalidad;
        }
        public function getImagen() {
            return $this->imagen;
        }
        public function getHumano() {
            return $this->humano;
        }
        public function getPuntos_Hs() {
            return $this->puntos_hs;
        }
        public function getPuntos_Hp() {
            return $this->puntos_hp;
        }
        public function getPuntos_Totales() {
            return $this->puntos_totales;
        }
        public function getHa() {
            return $this->ha;
        }
        public function getHp() {
            return $this->hp;
        }
        public function getHe() {
            return $this->he;
        }
        public function getLa() {
            return $this->la;
        }
        public function getAcrobacias() {
            return $this->acrobacias;
        }
        public function getAtletismo() {
            return $this->atletismo;
        }
        public function getMontar() {
            return $this->montar;
        }
        public function getNadar() {
            return $this->nadar;
        }
        public function getTrepar() {
            return $this->trepar;
        }
        public function getSaltar() {
            return $this->saltar;
        }
        public function getFrialdad() {
            return $this->frialdad;
        }
        public function getProezas_fuerza() {
            return $this->proezas_fuerza;
        }
        public function getResistir_dolor() {
            return $this->resistir_dolor;
        }
        public function getAdvertir() {
            return $this->advertir;
        }
        public function getBuscar() {
            return $this->buscar;
        }
        public function getRastrear() {
            return $this->rastrear;
        }
        public function getAnimales() {
            return $this->animales;
        }
        public function getCiencia() {
            return $this->ciencia;
        }
        public function getHerbolaria() {
            return $this->herbolaria;
        }
        public function getHistoria() {
            return $this->historia;
        }
        public function getMedicina() {
            return $this->medicina;
        }
        public function getMemorizar() {
            return $this->memorizar;
        }
        public function getNavegacion() {
            return $this->navegacion;
        }
        public function getOcultismo() {
            return $this->ocultismo;
        }
        public function getTasacion() {
            return $this->tasacion;
        }
        public function getLey() {
            return $this->ley;
        }
        public function getTactica() {
            return $this->tactica;
        }
        public function getEstilo() {
            return $this->estilo;
        }
        public function getIntimidar() {
            return $this->intimidar;
        }
        public function getLiderazgo() {
            return $this->liderazgo;
        }
        public function getPersuasion() {
            return $this->persuasion;
        }
        public function getComerciar() {
            return $this->comerciar;
        }
        public function getCallejeo() {
            return $this->callejeo;
        }
        public function getEtiqueta() {
            return $this->etiqueta;
        }
        public function getCerrajeria() {
            return $this->cerrajeria;
        }
        public function getDisfraz() {
            return $this->disfraz;
        }
        public function getOcultarse() {
            return $this->ocultarse;
        }
        public function getRobo() {
            return $this->robo;
        }
        public function getSigilo() {
            return $this->sigilo;
        }
        public function getTramperia() {
            return $this->tramperia;
        }
        public function getVenenos() {
            return $this->venenos;
        }
        public function getArte() {
            return $this->arte;
        }
        public function getBaile() {
            return $this->baile;
        }
        public function getForja() {
            return $this->forja;
        }
        public function getTrucos_manos() {
            return $this->trucos_manos;
        }
        public function getCanto() {
            return $this->canto;
        }
        public function getRunas() {
            return $this->runas;
        }
        public function getAnimismo() {
            return $this->animismo;
        }
        public function getAlquimia() {
            return $this->alquimia;
        }
        public function getEspecial1() {
            return $this->especial1;
        }
        public function getEspecial2() {
            return $this->especial2;
        }
        public function getEspecial3() {
            return $this->especial3;
        }
        public function getEspecial4() {
            return $this->especial4;
        }
        
    }
?>