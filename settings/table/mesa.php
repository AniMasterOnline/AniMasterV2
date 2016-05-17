<!-- Header content box -->
<?php
session_start();
if(isset($_SESSION['user'])){
    $value=$_SESSION['user'];
    //var_dump($value);
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    /* Requiere_once i gets */
    require_once "../../System/Classes/Partida.php";
    require_once "../../System/Classes/Partida_Usuari.php";
    $id_partida = $_GET['id'];
    $id_usuario = $value['id_usuario'];
    
    /* Comprobacion de si el usuario tiene acceso a la partida o si existe*/
    $partida= new Partida();
    $partida= $partida->viewPartida($id_partida);
    if($partida !== null){
        $partida_usuari= new Partida_Usuari();
        $you_can_not_pass = $partida_usuari->testInvited($id_usuario, $id_partida);
        if(empty($partida) || $you_can_not_pass!== true){
            if($id_usuario != $partida->getId_Usuario()){
                include '../404/404.php';
            }
        }
    }else{
        include '../404/404.php';
    }
    
    
    /* Variables de la partida */
    $id_master = $partida->getId_Usuario();
    $nombre = $partida->getNombre();
    $imagen = $partida->getImagen();
    $descripcion = $partida->getDescripcion();
    $anyo = $partida->getAnyo();
    $nv_sobrenatural = $partida->getNv_Sobrenatural();
    $limite = $partida->getLimite();
    $token = $partida->getToken();
    $diario = $partida->getDiario();
    
    /* Comprobacion de si el jugador tiene personaje */
    require_once "../../System/Classes/Personaje.php";
    $personaje = new Personaje();
    $return=$personaje->viewPersonajeUsuario($value['id_usuario'], $id_partida);
    if($return === null && $id_usuario != $id_master ){
       header('location: ../character/new_personaje1.php?id_partida='.$id_partida); //redireccion a crear Personaje
       exit();
    }
    
    /* Archivo del xat !important */
    $file = '../../System/Logs/'.$id_partida.'-'.$nombre;
    if (!file_exists($file)) {
        fwrite(fopen($file, 'a'), "<div class='chatbox pull-left f-11 text-center system'><span>¡Inicio de la sesion de roleo!</span></div>\n"); 
    }

}else{
    include '../404/404.php';
}
$title='Nom Partida';
$migas='#'.$nombre;
include "../../Public/layouts/head.php";?>


<LINK HREF="../../Public/css/mesa.css" rel="stylesheet">
<script src="../../Public/js/chat.js"></script>
<script>
    // ask user for name with popup prompt    
    var file = '<?php echo $id_partida.'-'.$nombre ?>';
    var name = '><?php echo $value['nickname']; ?>';
    var color = "<?php if($id_master == $value['id_usuario']){ echo 'c-purple'; }else{ echo 'c-black'; } ?>";

    var chat =  new Chat();
    $(function() {
        instanse = false;
        chat.getState(file); 

        $('#sendie-btn').click(function(e) {
            var text = $('#sendie').val();
            $('#sendie').val('');
            chat.send(text, name, color, file);
        });
        $('#sendie-btnimg').click(function(e) {
            console.log('send Image');
            swal({
                title: "Enviar Imagen!",
                text: "url de la imagen:",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                inputPlaceholder: "url"
              }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                  swal.showInputError("Tienes que pegar aqui una url valida!");
                  return false
                }
                chat.sendimg(inputValue, name, color, file);
                swal("Imagen enviada!", "url: " + inputValue, "success");
              });
            
        });
        $('#sendie').keyup(function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if(code == 13) { //Enter keycode
                var text = $('#sendie').val();
                $('#sendie').val('');
                chat.send(text, name, color, file);
            }
        });
    });
    $(window).load(function() {
        chat.loadxat(file);
        setInterval(myFunction(), 2000);

        function myFunction() {
            setInterval(function(){ chat.update(file); }, 1500);
        }
    });
</script>
<!-- Menu Toggle Script -->
<?php
    function rcolor(){
        $color = substr(md5(rand()), 0, 6);
        return 'style="color: #'.$color.';"';
    }
?>

<!-- Body content box -->
<div id="wrapper" >
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="z-depth-1">
            <div class="bgchatimg">&nbsp;</div>
            <div id="chat-top" class="z-depth-1 bgm-white ">
                <ul class="top-menu" id="top-menu-chat">
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="#"><i class="tm-icon zmdi zmdi-more-vert c-black"></i></a>
                        <ul class="dropdown-menu dm-icon pull-right" id="menu-chat-ul">
                            <li id="sendie-btnimg"><a><i class="zmdi zmdi-image-o"></i>Enviar Imagen</a></li>
                            <!-- <li id="sendie-btnvid"><a><i class="zmdi zmdi-slideshow"></i> Enviar Video</a></li> -->
                            <!-- <li role="separator" class="divider"></li> -->
                            
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="chat-container" class="c-overflow">
                
            </div>
            <div id="chat-box" class="z-depth-1-top bgm-gray lv-footer ms-reply p-0 b-0" >
                <textarea id="sendie" placeholder="What's on your mind..."></textarea>
                <button id="sendie-btn" ><i class="zmdi zmdi-mail-send"></i></button>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        
        <!-- Page Content -->
        <div  id="page-content-wrapper">
            <div class="container-fluid">
                <?php 
                    if($id_usuario != $id_master){
                        include '../../Public/layouts/mesa-jugador.php';
                    }else{
                        include '../../Public/layouts/mesa-master.php';
                    }
                ?>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

<!-- Footer content box -->
<?php include "../../Public/layouts/footer.php";?> 

