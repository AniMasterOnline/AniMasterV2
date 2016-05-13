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
        private $puntos_hs;
        private $puntos_hp;
        private $puntos_totales;
        private $ha;
        private $hp;
        private $he;
        private $la;
        private $acrobacias;
        private $atletismo;
        private $montar;
        private $nadar;
        private $trepar;
        private $saltar;
        private $frialdad;
        private $proezas_fuerza;
        private $resistir_dolor;
        private $advertir;
        private $buscar;
        private $rastrear;
        private $animales;
        private $ciencia;
        private $herbolaria;
        private $historia;
        private $medicina;
        private $memorizar;
        private $navegacion;
        private $ocultismo;
        private $tasacion;
        private $ley;
        private $tactica;
        private $estilo;
        private $intimidar;
        private $liderazgo;
        private $persuasion;
        private $comerciar;
        private $callejeo;
        private $etiqueta;
        private $cerrajeria;
        private $disfraz;
        private $ocultarse;
        private $robo;
        private $sigilo;
        private $tramperia;
        private $venenos;
        private $arte;
        private $baile;
        private $forja;
        private $trucos_manos;
        private $canto;
        private $runas;
        private $animismo;
        private $alquimia;
        private $especial1;
        private $especial2;
        private $especial3;
        private $especial4;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db2 = $db->query("INSERT INTO Personaje(`id_usuario`, `id_partida`, `id_categoria`, `nombre`, `apellido`, `edad`, `nivel`, `turno`, `puntos_vida`, `sexo`, `raza`, `pelo`, `ojos`, `altura`, `peso`, `apariencia`, `tamanyo`, `exp_actual`, `c_AGI`, `c_CON`, `c_DES`, `c_FUE`, `c_INT`, `c_PER`, `c_POD`, `c_VOL`, `nacionalidad`, `imagen`, `humano`, `puntos_hs`, `puntos_hp`, `puntos_totales`, `ha`, `hp`, `he`, `la`, `acrobacias`, `atletismo`, `montar`, `nadar`, `trepar`, `saltar`, `frialdad`, `proezas_fuerza`, `resistir_dolor`, `advertir`, `buscar`, `rastrear`, `animales`, `ciencia`, `herbolaria`, `historia`, `medicina`, `memorizar`, `navegacion`, `ocultismo`, `tasacion`, `ley`, `tactica`, `estilo`, `intimidar`, `liderazgo`, `persuasion`, `comerciar`, `callejeo`, `etiqueta`, `cerrajeria`, `disfraz`, `ocultarse`, `robo`, `sigilo`, `tramperia`, `venenos`, `arte`, `baile`, `forja`, `trucos_manos`, `canto`, `runas`, `animismo`, `alquimia`, `especial1`, `especial2`, `especial3`, `especial4`) "
                    . "VALUES ('$this->id_usuario', '$this->id_partida', '$this->id_categoria', '$this->nombre', '$this->apellido', '$this->edad', '$this->nivel', '$this->turno', '$this->puntos_vida', '$this->sexo', '$this->raza', '$this->pelo', '$this->ojos', '$this->altura', '$this->peso', '$this->apariencia', '$this->tamanyo', '$this->exp_actual', '$this->c_AGI', '$this->c_CON', '$this->c_DES', '$this->c_FUE', '$this->c_INT', '$this->c_PER', '$this->c_POD', '$this->c_VOL', '$this->nacionalidad', '$this->imagen', '$this->humano', '$this->puntos_hs', '$this->puntos_hp', '$this->puntos_totales', '$this->ha', '$this->hp', '$this->he', '$this->la', '$this->acrobacias', '$this->atletismo', '$this->montar', '$this->nadar', '$this->trepar', '$this->saltar', '$this->frialdad', '$this->proezas_fuerza', '$this->resistir_dolor', '$this->advertir', '$this->buscar', '$this->rastrear', '$this->animales', '$this->ciencia', '$this->herbolaria', '$this->historia', '$this->medicina', '$this->memorizar', '$this->navegacion', '$this->ocultismo', '$this->tasacion', '$this->ley', '$this->tactica', '$this->estilo', '$this->intimidar', '$this->liderazgo', '$this->persuasion', '$this->comerciar', '$this->callejeo', '$this->etiqueta', '$this->cerrajeria', '$this->disfraz', '$this->ocultarse', '$this->robo', '$this->sigilo', '$this->tramperia', '$this->venenos', '$this->arte', '$this->baile', '$this->forja', '$this->trucos_manos', '$this->canto', '$this->runas', '$this->animismo', '$this->alquimia', '$this->especial1', '$this->especial2', '$this->especial3', '$this->especial4')");
            //echo '<br><br>';
            //var_dump($db2);
            //echo '<br><br>';
            //var_dump($db);
            
            $db->close();
            return $db2;
        }
        
        public function delete($var){
            $db = new connexio();
            $result = $sql = "delete from Personaje where id_personaje = $var";
            $db->query($sql);
            return $result;
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Personaje";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Per = new Personaje($obj["id_usuario"]);
                array_push($rtn, $Per);
                //var_dump($Per);
            }
            $db->close();
            return $rtn;
        }
        
        public function viewPersonaje($id_personaje){ 
            $db = new connexio();
            $sql = "SELECT * FROM Personaje WHERE id_personaje = '$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
            }else{
                return null;
            }
        }
        
        public function viewPersonajeValor($id_personaje){ 
            $db = new connexio();
            $sql = "SELECT `acrobacias`, `atletismo`, `montar`, `nadar`, `trepar`, `saltar`, `frialdad`, `proezas_fuerza` as `p. fuerza`, `resistir_dolor` as 'res. dolor', `advertir`, `buscar`, `rastrear`, `animales`, `ciencia`, `herbolaria`, `historia`, `medicina`, `memorizar`, `navegacion`, `ocultismo`, `tasacion`, `ley`, `tactica`, `estilo`, `intimidar`, `liderazgo`, `persuasion`, `comerciar`, `callejeo`, `etiqueta`, `cerrajeria`, `disfraz`, `ocultarse`, `robo`, `sigilo`, `tramperia`, `venenos`, `arte`, `baile`, `forja`, `trucos_manos` as 't. manos', `canto`, `runas`, `animismo`, `alquimia`, `especial1`, `especial2`, `especial3`, `especial4` FROM `personaje` WHERE `id_personaje`='$id_personaje'";
            $query = $db->query($sql);
            $db->close();
            if ($query->num_rows > 0) {
                $row = $query->fetch_assoc();
                return $row;
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
        public function updateExpe($experiencia_Nova,$id_personaje){
            $db = new connexio();
            
            $sqlget = "SELECT exp_actual FROM Personaje WHERE id_personaje = '$id_personaje'";
            $query = $db->query($sqlget);
            $experiencia_Actual = $query->fetch_assoc();
            
            $experiencia_Final = 0;
            $experiencia_Final = $experiencia_Actual['exp_actual'] + (int)$experiencia_Nova;
            
            $sqlmod = "UPDATE Personaje SET exp_actual='$experiencia_Final' WHERE id_personaje = '$id_personaje'";
            
            $result = $db->query($sqlmod);
            
            $db->close();
            return $result;
        }
        public function updatePersonaje($level_Nou, $experiencia_Nova,$id_personaje){
            $db = new connexio();
            
            $sqlmod = "UPDATE Personaje SET nivel='$level_Nou', exp_actual='$experiencia_Nova' WHERE id_personaje = '$id_personaje'";
            
            $result = $db->query($sqlmod);
            
            $db->close();
            return $result;
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
            $this->id_partida=0;
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
            $this->puntos_hs = 0; 
            $this->puntos_hp = 0; 
            $this->puntos_totales = 0; 
            $this->ha = 0; 
            $this->hp = 0; 
            $this->he = 0; 
            $this->la = 0; 
            $this->acrobacias = 0; 
            $this->atletismo = 0; 
            $this->montar = 0; 
            $this->nadar = 0; 
            $this->trepar = 0; 
            $this->saltar = 0; 
            $this->frialdad = 0; 
            $this->proezas_fuerza = 0; 
            $this->resistir_dolor = 0; 
            $this->advertir = 0; 
            $this->buscar = 0; 
            $this->rastrear = 0; 
            $this->animales = 0; 
            $this->ciencia = 0; 
            $this->herbolaria = 0; 
            $this->historia = 0; 
            $this->medicina = 0; 
            $this->memorizar = 0; 
            $this->navegacion = 0; 
            $this->ocultismo = 0; 
            $this->tasacion = 0; 
            $this->ley = 0; 
            $this->tactica = 0; 
            $this->estilo = 0; 
            $this->intimidar = 0; 
            $this->liderazgo = 0; 
            $this->persuasion = 0; 
            $this->comerciar = 0; 
            $this->callejeo = 0; 
            $this->etiqueta = 0; 
            $this->cerrajeria = 0; 
            $this->disfraz = 0; 
            $this->ocultarse = 0; 
            $this->robo = 0; 
            $this->sigilo = 0; 
            $this->tramperia = 0; 
            $this->venenos = 0; 
            $this->arte = 0; 
            $this->baile = 0; 
            $this->forja = 0; 
            $this->trucos_manos = 0; 
            $this->canto = 0; 
            $this->runas = 0; 
            $this->animismo = 0; 
            $this->alquimia = 0; 
            $this->especial1 = 0; 
            $this->especial2 = 0; 
            $this->especial3 = 0; 
            $this->especial4 = 0;
        }
        
        function __construct9($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10){
            $this->id_personaje=0;
            $this->id_usuario = $a2;
            $this->id_partida=$a3;
            $this->id_categoria = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->edad = $a7;
            $this->nivel = $a8;
            $this->turno = $a9; 
            $this->puntos_vida = $a10;
        }
        function __construct85($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23, $a24, $a25, $a26, $a27, $a28, $a29, $a30, $a31, $a32, $a33, $a34, $a35, $a36, $a37, $a38, $a39, $a40, $a41, $a42, $a43, $a44, $a45, $a46, $a47, $a48, $a49, $a50, $a51, $a52, $a53, $a54, $a55, $a56, $a57, $a58, $a59, $a60, $a61, $a62, $a63, $a64, $a65, $a66, $a67, $a68, $a69, $a70, $a71, $a72, $a73, $a74, $a75, $a76, $a77, $a78, $a79, $a80, $a81, $a82, $a83, $a84, $a85, $a86){
            $this->id_personaje=0;
            $this->id_usuario = $a2;
            $this->id_partida=$a3;
            $this->id_categoria = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->edad = $a7;
            $this->nivel = $a8;
            $this->turno = $a9; 
            $this->puntos_vida = $a10; 
            $this->sexo = $a11; 
            $this->raza = $a12; 
            $this->pelo = $a13; 
            $this->ojos = $a14; 
            $this->altura = $a15; 
            $this->peso = $a16; 
            $this->apariencia = $a17; 
            $this->tamanyo = $a18; 
            $this->exp_actual = $a19; 
            $this->c_AGI = $a20; 
            $this->c_CON = $a21; 
            $this->c_DES = $a22; 
            $this->c_FUE = $a23; 
            $this->c_INT = $a24; 
            $this->c_PER = $a25;
            $this->c_POD = $a26;
            $this->c_VOL = $a27; 
            $this->nacionalidad = $a28; 
            $this->imagen = $a29; 
            $this->humano = $a30; 
            $this->puntos_hs = $a31; 
            $this->puntos_hp = $a32; 
            $this->puntos_totales = $a33; 
            $this->ha = $a34; 
            $this->hp = $a35; 
            $this->he = $a36; 
            $this->la = $a37; 
            $this->acrobacias = $a38; 
            $this->atletismo = $a39; 
            $this->montar = $a40; 
            $this->nadar = $a41; 
            $this->trepar = $a42; 
            $this->saltar = $a43; 
            $this->frialdad = $a44; 
            $this->proezas_fuerza = $a45; 
            $this->resistir_dolor = $a46; 
            $this->advertir = $a47; 
            $this->buscar = $a48; 
            $this->rastrear = $a49; 
            $this->animales = $a50; 
            $this->ciencia = $a51; 
            $this->herbolaria = $a52; 
            $this->historia = $a53; 
            $this->medicina = $a54; 
            $this->memorizar = $a55; 
            $this->navegacion = $a56; 
            $this->ocultismo = $a57; 
            $this->tasacion = $a58; 
            $this->ley = $a59; 
            $this->tactica = $a60; 
            $this->estilo = $a61; 
            $this->intimidar = $a62; 
            $this->liderazgo = $a63; 
            $this->persuasion = $a64; 
            $this->comerciar = $a65; 
            $this->callejeo = $a66; 
            $this->etiqueta = $a67; 
            $this->cerrajeria = $a68; 
            $this->disfraz = $a69; 
            $this->ocultarse = $a70; 
            $this->robo = $a71;
            $this->sigilo = $a72; 
            $this->tramperia = $a73; 
            $this->venenos = $a74; 
            $this->arte = $a75; 
            $this->baile = $a76; 
            $this->forja = $a77; 
            $this->trucos_manos = $a78; 
            $this->canto = $a79; 
            $this->runas = $a80; 
            $this->animismo = $a81; 
            $this->alquimia = $a82; 
            $this->especial1 = $a83; 
            $this->especial2 = $a84; 
            $this->especial3 = $a85; 
            $this->especial4 = $a86; 
        }
        
        function __construct1($a5){
            $this->id_personaje=0;
            $this->nombre = $a5;
        }
        
        function __construct86($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23, $a24, $a25, $a26, $a27, $a28, $a29, $a30, $a31, $a32, $a33, $a34, $a35, $a36, $a37, $a38, $a39, $a40, $a41, $a42, $a43, $a44, $a45, $a46, $a47, $a48, $a49, $a50, $a51, $a52, $a53, $a54, $a55, $a56, $a57, $a58, $a59, $a60, $a61, $a62, $a63, $a64, $a65, $a66, $a67, $a68, $a69, $a70, $a71, $a72, $a73, $a74, $a75, $a76, $a77, $a78, $a79, $a80, $a81, $a82, $a83, $a84, $a85, $a86){
            $this->id_personaje=$a1;
            $this->id_usuario = $a2;
            $this->id_partida=$a3;
            $this->id_categoria = $a4;
            $this->nombre = $a5;
            $this->apellido = $a6;
            $this->edad = $a7;
            $this->nivel = $a8;
            $this->turno = $a9; 
            $this->puntos_vida = $a10; 
            $this->sexo = $a11; 
            $this->raza = $a12; 
            $this->pelo = $a13; 
            $this->ojos = $a14; 
            $this->altura = $a15; 
            $this->peso = $a16; 
            $this->apariencia = $a17; 
            $this->tamanyo = $a18; 
            $this->exp_actual = $a19; 
            $this->c_AGI = $a20; 
            $this->c_CON = $a21; 
            $this->c_DES = $a22; 
            $this->c_FUE = $a23; 
            $this->c_INT = $a24; 
            $this->c_PER = $a25;
            $this->c_POD = $a26;
            $this->c_VOL = $a27; 
            $this->nacionalidad = $a28; 
            $this->imagen = $a29; 
            $this->humano = $a30; 
            $this->puntos_hs = $a31; 
            $this->puntos_hp = $a32; 
            $this->puntos_totales = $a33; 
            $this->ha = $a34; 
            $this->hp = $a35; 
            $this->he = $a36; 
            $this->la = $a37; 
            $this->acrobacias = $a38; 
            $this->atletismo = $a39; 
            $this->montar = $a40; 
            $this->nadar = $a41; 
            $this->trepar = $a42; 
            $this->saltar = $a43; 
            $this->frialdad = $a44; 
            $this->proezas_fuerza = $a45; 
            $this->resistir_dolor = $a46; 
            $this->advertir = $a47; 
            $this->buscar = $a48; 
            $this->rastrear = $a49; 
            $this->animales = $a50; 
            $this->ciencia = $a51; 
            $this->herbolaria = $a52; 
            $this->historia = $a53; 
            $this->medicina = $a54; 
            $this->memorizar = $a55; 
            $this->navegacion = $a56; 
            $this->ocultismo = $a57; 
            $this->tasacion = $a58; 
            $this->ley = $a59; 
            $this->tactica = $a60; 
            $this->estilo = $a61; 
            $this->intimidar = $a62; 
            $this->liderazgo = $a63; 
            $this->persuasion = $a64; 
            $this->comerciar = $a65; 
            $this->callejeo = $a66; 
            $this->etiqueta = $a67; 
            $this->cerrajeria = $a68; 
            $this->disfraz = $a69; 
            $this->ocultarse = $a70; 
            $this->robo = $a71;
            $this->sigilo = $a72; 
            $this->tramperia = $a73; 
            $this->venenos = $a74; 
            $this->arte = $a75; 
            $this->baile = $a76; 
            $this->forja = $a77; 
            $this->trucos_manos = $a78; 
            $this->canto = $a79; 
            $this->runas = $a80; 
            $this->animismo = $a81; 
            $this->alquimia = $a82; 
            $this->especial1 = $a83; 
            $this->especial2 = $a84; 
            $this->especial3 = $a85; 
            $this->especial4 = $a86; 
        }
           
        //METODES SET
        public function setId_Personaje($id_personaje) {
            $this->id_personaje = $id_personaje;
        }
        public function setId_Partida($id_partida) {
            $this->id_partida = $id_partida;
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
        public function setPuntos_hs($puntos_hs) {
            $this->puntos_hs = $puntos_hs;
        }
        public function setPuntos_hp($puntos_hp) {
            $this->puntos_hp = $puntos_hp;
        }
        public function setPuntos_Totales($puntos_totales) {
            $this->puntos_totales = $puntos_totales;
        }
        public function setHa($ha) {
            $this->ha = $ha;
        }
        public function setHp($hp) {
            $this->hp = $hp;
        }
        public function setHe($he) {
            $this->he = $he;
        }
        public function setLa($la) {
            $this->la = $la;
        }
        public function setAcrobacias($acrobacias) {
            $this->acrobacias = $acrobacias;
        }
        public function setAtletismo($atletismo) {
            $this->atletismo = $atletismo;
        }
        public function setMontar($montar) {
            $this->montar = $montar;
        }
        public function setNadar($nadar) {
            $this->nadar = $nadar;
        }
        public function setTrepar($trepar) {
            $this->trepar = $trepar;
        }
        public function setSaltar($saltar) {
            $this->saltar = $saltar;
        }
        public function setFrialdad($frialdad) {
            $this->frialdad = $frialdad;
        }
        public function setProezas_Fuerza($proezas_fuerza) {
            $this->proezas_fuerza = $proezas_fuerza;
        }
        public function setResistir_Dolor($resistir_dolor) {
            $this->resistir_dolor = $resistir_dolor;
        }
        public function setAdvertir($advertir) {
            $this->advertir = $advertir;
        }
        public function setBuscar($buscar) {
            $this->buscar = $buscar;
        }
        public function setRastrear($rastrear) {
            $this->rastrear = $rastrear;
        }
        public function setAnimales($animales) {
            $this->animales = $animales;
        }
        public function setCiencia($ciencia) {
            $this->ciencia = $ciencia;
        }
        public function setHerbolaria($herbolaria) {
            $this->herbolaria = $herbolaria;
        }
        public function setHistoria($historia) {
            $this->historia = $historia;
        }
        public function setMedicina($medicina) {
            $this->medicina = $medicina;
        }
        public function setMemorizar($memorizar) {
            $this->memorizar = $memorizar;
        }
        public function setNavegacion($navegacion) {
            $this->navegacion = $navegacion;
        }
        public function setOcultismo($ocultismo) {
            $this->ocultismo = $ocultismo;
        }
        public function setTasacion($tasacion) {
            $this->tasacion = $tasacion;
        }
        public function setLey($ley) {
            $this->ley = $ley;
        }
        public function setTactica($tactica) {
            $this->tactica = $tactica;
        }
        public function setEstilo($estilo) {
            $this->estilo = $estilo;
        }
        public function setIntimidar($intimidar) {
            $this->intimidar = $intimidar;
        }
        public function setLiderazgo($liderazgo) {
            $this->liderazgo = $liderazgo;
        }
        public function setPersuasion($persuasion) {
            $this->persuasion = $persuasion;
        }
        public function setComerciar($comerciar) {
            $this->comerciar = $comerciar;
        }
        public function setCallejeo($callejeo) {
            $this->callejeo = $callejeo;
        }
        public function setEtiqueta($etiqueta) {
            $this->etiqueta = $etiqueta;
        }
        public function setCerrajeria($cerrajeria) {
            $this->cerrajeria = $cerrajeria;
        }
        public function setDisfraz($disfraz) {
            $this->disfraz = $disfraz;
        }
        public function setOcultarse($ocultarse) {
            $this->ocultarse = $ocultarse;
        }
        public function setRobo($robo) {
            $this->robo = $robo;
        }
        public function setSigilo($sigilo) {
            $this->sigilo = $sigilo;
        }
        public function setTramperia($tramperia) {
            $this->tramperia = $tramperia;
        }
        public function setVenenos($venenos) {
            $this->venenos = $venenos;
        }
        public function setArte($arte) {
            $this->arte = $arte;
        }
        public function setBaile($baile) {
            $this->baile = $baile;
        }
        public function setForja($forja) {
            $this->forja = $forja;
        }
        public function setTrucos_Manos($trucos_manos) {
            $this->trucos_manos = $trucos_manos;
        }
        public function setCanto($canto) {
            $this->canto = $canto;
        }
        public function setRunas($runas) {
            $this->runas = $runas;
        }
        public function setAnimismo($animismo) {
            $this->animismo = $animismo;
        }
        public function setAlquimia($alquimia) {
            $this->alquimia = $alquimia;
        }
        public function setEspecial1($especial1) {
            $this->especial1 = $especial1;
        }
        public function setEspecial2($especial2) {
            $this->especial2 = $especial2;
        }
        public function setEspecial3($especial3) {
            $this->especial3 = $especial3;
        }
        public function setEspecial4($especial4) {
            $this->especial4 = $especial4;
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