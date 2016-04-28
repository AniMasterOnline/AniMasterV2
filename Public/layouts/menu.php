<?php
	session_start();
	if(isset($_SESSION['user'])){
		$value=$_SESSION['user'];
		//var_dump($value);
	}
        $self = $_SERVER['PHP_SELF'];
	function migasdepan($migas){
		$migasdepan = explode("#",$migas);
		$contmigas = count($migasdepan);
		echo '<ol class="breadcrumb">';
		for ($i = 1; $i < $contmigas; $i++){
			$pan = explode("|", $migasdepan[$i]);
			if ($i == 1){
				if(count($pan) == 2){
					echo '<li><a href="'.$pan[1].'"> '.$pan[0].'</a></li>';
				}else{
					echo '<li class="active">'.$pan[0].'</li> ';
				}
			}else{
				if(count($pan) == 2){
					echo '<li><a href="'.$pan[1].'"> '.$pan[0].'</a></li>';
				}else{
					echo '<li class="active">'.$pan[0].'</li> ';
				}
			}
		}
                echo '</ol>';
                
	}
?>

<nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">AniMaster Online v2</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AniMaster Online v2</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php
                if (strpos($self,"AniMasterV2/index.php")) {
                    echo '<li class="active"><a href="index.php">Inicio</a></li>';
                    echo '<li><a href="partida.php">Partidas de Rol</a></li>';
                    echo '<li><a href="user/zone.php">Tus Partidas</a></li>';
                }else if (strpos($self,"settings/")) {
                    echo '<li><a href="../../">Inicio</a></li>';
                    echo '<li><a href="../../partida.php">Partidas de Rol</a></li>';
                    echo '<li><a href="../../settings/table">Tus Partidas</a></li>';
                }else if (strpos($self,"admin/")) {
                    echo '<li><a href="../index.php">Inicio</a></li>';
                    echo '<li><a href="../partida.php">Partidas de Rol</a></li>';
                    echo '<li><a href="../user/zone.php">Tus Partidas</a></li>';
                }else{
                    echo '<li><a href="index.php">Inicio</a></li>';
                    echo '<li><a href="partida.php">Partidas de Rol</a></li>';
                    echo '<li><a href="user/zone.php">Tus Partidas</a></li>';
                }
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right"> 
            <?php
            if(isset($_SESSION['user'])){
                if (strpos($self,"settings/")) {
                    echo '
                        <li>
                            <div class="btn-group navbar-btn">
                              <a id="menubtndown" href="../../settings/account" class="btn btn-primary" role="button">Hola, '.ucfirst($value['nickname']).'!</a>
                              <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="glyphicon glyphicon-th-large"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="../../admin/">AdminPanel</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../settings/notifications">Mensajes</a></li>
                                <li><a href="../../settings/table">Mi Mesa</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../../help.php">Ayuda</a></li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="../../settings/account"><i class="fa fa-cog" aria-hidden="true">&nbsp;</i>Configuración</a></li>
                                <li><a target="_self" href="../../logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Cerrar sesión</a></li>
                              </ul>
                            </div>
                        </li>';
                }else if (strpos($self,"admin/")) {
                    echo '
                        <li>
                            <div class="btn-group navbar-btn">
                              <a id="menubtndown" href="../settings/account" class="btn btn-primary" role="button">Hola, '.ucfirst($value['nickname']).'!</a>
                              <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="glyphicon glyphicon-th-large"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="../admin/">AdminPanel</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../settings/notifications">Mensajes</a></li>
                                <li><a href="../settings/table">Mi Mesa</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../help.php">Ayuda</a></li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="../settings/account"><i class="fa fa-cog" aria-hidden="true">&nbsp;</i>Configuración</a></li>
                                <li><a target="_self" href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Cerrar sesión</a></li>
                              </ul>
                            </div>
                        </li>';
                }else{
                    echo '
                        <li>
                            <div class="btn-group navbar-btn">
                              <a id="menubtndown" href="settings/account" class="btn btn-primary" role="button">Hola, '.ucfirst($value['nickname']).'!</a>
                              <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="glyphicon glyphicon-th-large"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="admin/">AdminPanel</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="settings/notifications">Mensajes</a></li>
                                <li><a href="settings/table">Mi Mesa</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="help.php">Ayuda</a></li>
                                <li role="separator" class="divider"></li>
                                <li ><a href="settings/account"><i class="fa fa-cog" aria-hidden="true">&nbsp;</i>Configuración</a></li>
                                <li><a target="_self" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Cerrar sesión</a></li>
                              </ul>
                            </div>
                        </li>';
                }
                
            }else{
                if (strpos($self,"user/")) {
                    echo '  <li>
                                <div class="btn-group navbar-btn">
                                    <a class="btn btn-link" role="button" href="../signup.php">Regístrate</a>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group navbar-btn">
                                    <a class="btn btn-default" role="button" href="../login.php">Iniciar Sesión</a>
                                </div>
                            </li>
                            ';
                }else if (strpos($self,"admin/")) {
                    echo '  <li>
                                <div class="btn-group navbar-btn">
                                    <a class="btn btn-link" role="button" href="../signup.php">Regístrate</a>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group navbar-btn">
                                    <a class="btn btn-default" role="button" href="../login.php">Iniciar Sesión</a>
                                </div>
                            </li>
                            ';
                }else{
                    echo '  <li>
                                <div class="btn-group navbar-btn">
                                    <a class="btn btn-link" role="button" href="signup.php">Regístrate</a>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group navbar-btn">
                                    <a class="btn btn-default" role="button" href="login.php">Iniciar Sesión</a>
                                </div>
                            </li>
                            ';
                } 
            }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
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
    $help = true;
    if($help){
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
                    <li><a target="_blank" href="/phpmyadmin"><i class="fa fa-server" aria-hidden="true">&nbsp;</i>phpmyadmin</a></li>
                    <li><a target="_blank" href="/AniMasterV2/theme.php"><i class="fa fa-file-code-o" aria-hidden="true">&nbsp;</i>Theme</a></li>
                </ul>
            </li>
            </div>';
    }
    ?>
            