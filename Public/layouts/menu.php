<?php
	function migasdepan($migas){
		$migasdepan = explode("#",$migas);
		$contmigas = count($migasdepan);
		echo '<ol class="breadcrumb bgm-white z-depth-1-bottom">';
		for ($i = 1; $i < $contmigas; $i++){
			$pan = explode("|", $migasdepan[$i]);
			if ($i == 1){
				if(count($pan) == 2){
					echo '<li><a href="'.$pan[1].'">'.$pan[0].'</a></li>';
				}else{
					echo '<li class="active">'.$pan[0].'</li> ';
				}
			}else{
				if(count($pan) == 2){
					echo '<li><a href="'.$pan[1].'">'.$pan[0].'</a></li>';
				}else{
					echo '<li class="active">'.$pan[0].'</li> ';
				}
			}
		}
                echo '</ol>';
                
	}
?>
<script>
    $( document ).ready(function() {
        $("#menu-trigger").click(function(e) {
            e.preventDefault();
            console.log('here');
            $(".ha-menu").toggleClass("toggled bgm-brown");
            $(".idplr").toggleClass("pull-right");
        });
    });
</script>
<header id="header" class="clearfix bgm-brown" >
    <ul class="header-inner">
        <li id="menu-trigger" class="visible-xs">
            <div class="line-wrap">
                <div class="line top"></div>
                <div class="line center"></div>
                <div class="line bottom"></div>
            </div>
        </li>
        <li class="logo hidden-xs">
            <a href="#"><i class="zmdi zmdi-shield-security shadowicon"></i> AniMaster Online</a>
        </li>
        <li class="pull-right">
            <ul class="top-menu">
                <li id="top-search">
                    <a href="#"><i class="tm-icon zmdi zmdi-search"></i></a>
                </li>
                <?php           
                    if (strpos($self,"admin/")){
                        if(isset($_SESSION['user'])){
                            require_once "../System/Classes/Partida_Usuari.php";
                            require_once "../System/Classes/Partida.php";
                            $partida_usuari = new Partida_Usuari();
                            $partida_usuari = $partida_usuari->viewInvited($value['id_usuario']);
                            $cont = 0;
                            if ($partida_usuari != null){
                                foreach ($partida_usuari as $row){
                                    $cont++;
                                }
                                echo '<li class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="tm-icon zmdi zmdi-accounts-add"></i>
                                            <i class="tmn-counts">'.$cont.'</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                                            <div class="listview">
                                                <div class="lv-header">
                                                    Notifications
                                                    <ul class="actions">
                                                        <li class="dropdown">
                                                            <a href="../System/Protocols/Partida_Signout.php?idu='.$value['id_usuario'].'">
                                                                <i class="zmdi zmdi-close"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="lv-body">';
                                                foreach ($partida_usuari as $row){
                                                    $id_partida = $row->getId_Partida();
                                                    $partida= new Partida();
                                                    $partida= $partida->viewPartida($id_partida);
                                                    $nombre = $partida->getNombre();
                                                    $imagen = $partida->getImagen();
                                                    $descripcion = $partida->getDescripcion();
                                                    echo '  
                                                        <a class="lv-item" href="../System/Protocols/Partida_Signin.php?idp='.$id_partida.'&idu='.$value['id_usuario'].'">
                                                            <div class="media">
                                                                <div class="pull-left">
                                                                    <img class="lv-img-sm" src="../Public/img/partida/'.$imagen.'" alt="">
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="lv-title">'.$nombre.'</div>
                                                                    <small class="lv-small">'.$descripcion.'</small>
                                                                </div>
                                                            </div>
                                                        </a>';
                                                }
                                    echo '  </div>
                                    </div>
                                </div>
                            </li>';
                            }else{
                                echo '  <li class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="tm-icon zmdi zmdi-accounts-add"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-lg pull-right">
                                                <div class="listview">
                                                    <div class="lv-header">
                                                        Notifications
                                                    </div>
                                                    <div class="lv-body">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>';
                            }   
                        }
                    }else if (strpos($self,"settings/")){
                        if(isset($_SESSION['user'])){
                            require_once "../../System/Classes/Partida_Usuari.php"; 
                            require_once "../../System/Classes/Partida.php";
                            $partida_usuari = new Partida_Usuari();
                            $partida_usuari = $partida_usuari->viewInvited($value['id_usuario']);
                            $cont = 0;
                            if ($partida_usuari != null){
                                foreach ($partida_usuari as $row){
                                    $cont++;
                                }
                                echo '<li class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="tm-icon zmdi zmdi-accounts-add"></i>
                                            <i class="tmn-counts">'.$cont.'</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                                            <div class="listview">
                                                <div class="lv-header">
                                                    Notifications
                                                    <ul class="actions">
                                                        <li class="dropdown">
                                                            <a href="../../System/Protocols/Partida_Signout.php?idu='.$value['id_usuario'].'">
                                                                <i class="zmdi zmdi-close"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="lv-body">';
                                                foreach ($partida_usuari as $row){
                                                    $id_partida = $row->getId_Partida();
                                                    $partida= new Partida();
                                                    $partida= $partida->viewPartida($id_partida);
                                                    $nombre = $partida->getNombre();
                                                    $imagen = $partida->getImagen();
                                                    $descripcion = $partida->getDescripcion();
                                                    echo '  
                                                        <a class="lv-item" href="../../System/Protocols/Partida_Signin.php?idp='.$id_partida.'&idu='.$value['id_usuario'].'">
                                                            <div class="media">
                                                                <div class="pull-left">
                                                                    <img class="lv-img-sm" src="../../Public/img/partida/'.$imagen.'" alt="">
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="lv-title">'.$nombre.'</div>
                                                                    <small class="lv-small">'.$descripcion.'</small>
                                                                </div>
                                                            </div>
                                                        </a>';
                                                }
                                    echo '  </div>
                                    </div>
                                </div>
                            </li>';
                            }else{
                                echo '  <li class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="tm-icon zmdi zmdi-accounts-add"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-lg pull-right">
                                                <div class="listview">
                                                    <div class="lv-header">
                                                        Notifications
                                                    </div>
                                                    <div class="lv-body">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>';
                            }   
                        }
                    }else{
                        if(isset($_SESSION['user'])){
                            require_once "System/Classes/Partida_Usuari.php";
                            require_once "System/Classes/Partida.php";
                            $partida_usuari = new Partida_Usuari();
                            $partida_usuari = $partida_usuari->viewInvited($value['id_usuario']);
                            $cont = 0;
                            if ($partida_usuari != null){
                                foreach ($partida_usuari as $row){
                                    $cont++;
                                }
                                echo '<li class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="tm-icon zmdi zmdi-accounts-add"></i>
                                            <i class="tmn-counts">'.$cont.'</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                                            <div class="listview">
                                                <div class="lv-header">
                                                    Notifications
                                                    <ul class="actions">
                                                        <li class="dropdown">
                                                            <a href="System/Protocols/Partida_Signout.php?idu='.$value['id_usuario'].'">
                                                                <i class="zmdi zmdi-close"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="lv-body">';
                                                foreach ($partida_usuari as $row){
                                                    $id_partida = $row->getId_Partida();
                                                        $partida= new Partida();
                                                        $partida= $partida->viewPartida($id_partida);
                                                        $nombre = $partida->getNombre();
                                                        $imagen = $partida->getImagen();
                                                        $descripcion = $partida->getDescripcion();
                                                        echo '  
                                                            <a class="lv-item" href="System/Protocols/Partida_Signin.php?idp='.$id_partida.'&idu='.$value['id_usuario'].'">
                                                                <div class="media">
                                                                    <div class="pull-left">
                                                                        <img class="lv-img-sm" src="Public/img/partida/'.$imagen.'" alt="">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="lv-title">'.$nombre.'</div>
                                                                        <small class="lv-small">'.$descripcion.'</small>
                                                                    </div>
                                                                </div>
                                                            </a>';
                                                }
                                    echo '  </div>
                                    </div>
                                </div>
                            </li>';
                            }else{
                                echo '  <li class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="tm-icon zmdi zmdi-accounts-add"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-lg pull-right">
                                                <div class="listview">
                                                    <div class="lv-header">
                                                        Notifications
                                                    </div>
                                                    <div class="lv-body">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>';
                            }    
                        }
                    }
                    
                ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#"><i class="tm-icon zmdi zmdi-more-vert"></i></a>
                    <ul class="dropdown-menu dm-icon pull-right">
                        <?php
                            if(isset($_SESSION['user'])){
                                if ($value['id_tipo'] == 0){
                                    if (strpos($self,"admin/")){
                                        echo '  <li><a href="../admin/"><i class="zmdi zmdi-lock-open"></i></i> Admin Panel</a></li>
                                                <li><a href="../settings/"><i class="zmdi zmdi-settings"></i> Configuración</a></li>
                                                <li><a href="../logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="dropdown-header">Actions</li>';
                                    }else if (strpos($self,"settings/")){
                                        echo '  <li><a href="../../admin/"><i class="zmdi zmdi-lock-open"></i></i> Admin Panel</a></li>
                                                <li><a href="../../settings/"><i class="zmdi zmdi-settings"></i> Configuración</a></li>
                                                <li><a href="../../logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="dropdown-header">Actions</li>';
                                    }else{
                                        echo '  <li><a href="admin/"><i class="zmdi zmdi-lock-open"></i></i> Admin Panel</a></li>
                                                <li><a href="settings/"><i class="zmdi zmdi-settings"></i> Configuración</a></li>
                                                <li><a href="logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="dropdown-header">Actions</li>';
                                    }
                                }else{
                                    if (strpos($self,"admin/")){
                                        echo '  <li><a href="../settings/"><i class="zmdi zmdi-settings"></i> Configuración</a></li>
                                                <li><a href="../help.php"><i class="zmdi zmdi-help"></i> Ayuda</a></li>
                                                <li><a href="../logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="dropdown-header">Actions</li>';
                                    }else if (strpos($self,"settings/")){
                                        echo '  <li><a href="../../settings/"><i class="zmdi zmdi-settings"></i> Configuración</a></li>
                                                <li><a href="../../logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="dropdown-header">Actions</li>';
                                    }else{
                                        echo '  <li><a href="settings/"><i class="zmdi zmdi-settings"></i> Configuración</a></li>
                                                <li><a href="logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li class="dropdown-header">Actions</li>';
                                    }
                                }
                                if(strpos($self,"mesa.php")){
                                    echo '<li role="presentation"><a href="#chat" id="menu-toggle"><i class="zmdi zmdi-view-agenda"></i> Toggle Chat</a></li>';
                                }
                            }
                        ?>
                        <li class="hidden-xs"><a data-action="fullscreen" href="#" ><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a></li>
                        <li><a data-action="clear-localstorage" href="#"><i class="zmdi zmdi-delete"></i> Clear Local Storage</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Top Search Content -->
    <div class="clearfix">
    </div>
    <!-- Top Menu Content -->
    <nav class="ha-menu">
        <ul>
            <?php
            if (strpos($self,"admin/")){
                echo '  <li class="waves-effect"><a href="../index.php">Inicio</a></li>
                        <li class="waves-effect"><a href="../partida.php">Partidas de Rol</a></li>
                        <li class="waves-effect"><a href="../zone.php">Zona Roleo</a></li>
                        <li class="waves-effect"><a href="../settings/table">Mi Mesa</a></li>';
            }else if (strpos($self,"AniMasterV2/index.php")){
                echo '  <li class="waves-effect active"><a href="index.php">Inicio</a></li>
                        <li class="waves-effect"><a href="partida.php">Partidas de Rol</a></li>
                        <li class="waves-effect"><a href="zone.php">Zona Roleo</a></li>
                        <li class="waves-effect"><a href="settings/table">Mi Mesa</a></li>';
            }else if (strpos($self,"AniMasterV2/partida.php")){
                echo '  <li class="waves-effect"><a href="index.php">Inicio</a></li>
                        <li class="waves-effect active"><a href="partida.php">Partidas de Rol</a></li>
                        <li class="waves-effect"><a href="zone.php">Zona Roleo</a></li>
                        <li class="waves-effect"><a href="settings/table">Mi Mesa</a></li>';
            }else if (strpos($self,"zone.php")){
                echo '  <li class="waves-effect"><a href="index.php">Inicio</a></li>
                        <li class="waves-effect"><a href="partida.php">Partidas de Rol</a></li>
                        <li class="waves-effect active"><a href="zone.php">Zona Roleo</a></li>
                        <li class="waves-effect"><a href="settings/table">Mi Mesa</a></li>';
            }else if (strpos($self,"settings/table/mesa.php")){
                echo '  <li class="waves-effect"><a href="../../index.php">Inicio</a></li>
                        <li class="waves-effect"><a href="../../partida.php">Partidas de Rol</a></li>
                        <li class="waves-effect"><a href="../../zone.php">Zona Roleo</a></li>
                        <li class="waves-effect"><a href="../../settings/table">Mi Mesa</a></li>';
            }else if (strpos($self,"settings/table/")){
                echo '  <li class="waves-effect"><a href="../../index.php">Inicio</a></li>
                        <li class="waves-effect"><a href="../../partida.php">Partidas de Rol</a></li>
                        <li class="waves-effect"><a href="../../zone.php">Zona Roleo</a></li>
                        <li class="waves-effect active"><a href="../../settings/table">Mi Mesa</a></li>';
            }else if (strpos($self,"settings/")){
                echo '  <li class="waves-effect"><a href="../../index.php">Inicio</a></li>
                        <li class="waves-effect"><a href="../../partida.php">Partidas de Rol</a></li>
                        <li class="waves-effect"><a href="../../zone.php">Zona Roleo</a></li>
                        <li class="waves-effect"><a href="../../settings/table">Mi Mesa</a></li>';
            }else{
                echo '  <li class="waves-effect"><a href="index.php">Inicio</a></li>
                        <li class="waves-effect"><a href="partida.php">Partidas de Rol</a></li>
                        <li class="waves-effect"><a href="zone.php">Zona Roleo</a></li>
                        <li class="waves-effect"><a href="settings/table">Mi Mesa</a></li>';
            }
            ?>
            
            <?php
                if(!isset($_SESSION['user'])){
                    echo '  <li class="waves-effect pull-right idplr"><a href="login.php">Login</a></li>
                            <li class="waves-effect pull-right idplr"><a href="signup.php">Registrate </a></li>';
                }
                if(isset($_SESSION['user'])){
                    if (strpos($self,"admin/")){
                        echo '  <li class="waves-effect pull-right idplr"><a href="../settings/">Hola, '.$value['nickname'].'!</a></li>';
                    }else if (strpos($self,"settings/table")){
                        echo '  <li class="waves-effect pull-right idplr"><a href="../../settings/">Hola, '.$value['nickname'].'!</a></li>';
                    }else if (strpos($self,"settings/")){
                        echo '  <li class="waves-effect pull-right idplr active"><a href="../../settings/">Hola, '.$value['nickname'].'!</a></li>';
                    }else{
                        echo '  <li class="waves-effect pull-right idplr"><a href="settings/">Hola, '.$value['nickname'].'!</a></li>';
                    }
                    
                } 
            ?>
            
        </ul>
    </nav>
    <!-- Top Search Content -->
    <div id="top-search-wrap">
        <div class="tsw-inner">
            <?php
                if (strpos($self,"settings/")) {
                    //pos 1 ../../partida.php
                    echo '<input id="urlpos" type="hidden" value="pos1">';
                }else if (strpos($self,"admin/")) {
                    //pos 2 ../partida.php
                    echo '<input id="urlpos" type="hidden" value="pos2">';
                }else{
                    //pos 3 partida.php
                    echo '<input id="urlpos" type="hidden" value="pos3">';
                }

            ?>
            <i id="top-search-close" class="zmdi zmdi-arrow-left"></i>
            <input type="text" id="top-search-input">
        </div>
    </div>
    
</header>
<?php
    if (strpos($self,"AniMasterV2/index.php")) {
        //none
    }else if (strpos($self,"AniMasterV2/mesa.php")) {
        //none
    }else if (strpos($self,"AniMasterV2/login.php")) {
        //none
    }else if (strpos($self,"AniMasterV2/signup.php")) {
        //none
    }else{
        //imprimim migas de pan
        migasdepan($migas); 
    }

?>
<?php
    //Mostrar o ocultar la ajuda --> Programació, accesos directes, etc...
    $help = false;
    if($help){
        //var_dump($value);
        echo '  <div style="position: fixed; bottom: 10px; left: 10px; z-index: 1000; list-style: none;">
                <li class="dropdown dropup">
                    <a href="#" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Heelp Me!! <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a target="_blank" href="http://librosweb.es/libro/bootstrap_3/capitulo_2.html">Manual Bootstrap</a></li>
                        <li><a target="_blank" href="http://getbootstrap.com/getting-started/">Bootstrap Getting Started</a></li>
                        <li><a target="_blank" href="http://getbootstrap.com/css/">Bootstrap Css</a></li>
                        <li><a target="_blank" href="http://getbootstrap.com/components/">Bootstrap Components</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Otros</li>
                        <li><a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/"><i class="fa fa-flag" aria-hidden="true">&nbsp;</i>FontAwesome</a></li>
                        <li><a target="_blank" href="http://zavoloklom.github.io/material-design-iconic-font/icons.html"><i class="zmdi zmdi-menu">&nbsp;</i>Material Design Iconic Font
</a></li>
                        <li><a target="_blank" href="/phpmyadmin"><i class="fa fa-server" aria-hidden="true">&nbsp;</i>phpmyadmin</a></li>
                        <li><a target="_blank" href="/AniMasterV2/theme.php"><i class="fa fa-file-code-o" aria-hidden="true">&nbsp;</i>Theme</a></li>
                    </ul>
                </li>
                </div>';
    }
?>
    
            