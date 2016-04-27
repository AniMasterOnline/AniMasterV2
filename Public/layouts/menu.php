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
          <a class="navbar-brand" href="index.php">AniMaster Online v2</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php
                if (strpos($self,"AniMasterV2/index.php")) {
                    echo '<li class="active"><a href="index.php">Home</a></li>';
                    echo '<li><a href="mesa.php">Mi Mesa</a></li>';
                    echo '<li><a href="theme.php">Theme</a></li>';
                }else if (strpos($self,"AniMasterV2/theme.php")) {
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li><a href="mesa.php">Mi Mesa</a></li>';
                    echo '<li class="active"><a href="theme.php">Theme</a></li>';
                }else if (strpos($self,"AniMasterV2/mesa.php")) {
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li class="active"><a href="mesa.php">Mi Mesa</a></li>';
                    echo '<li><a href="theme.php">Theme</a></li>';
                }else if (strpos($self,"user/")) {
                    echo '<li><a href="../index.php">Home</a></li>';
                    echo '<li><a href="../mesa.php">Mi Mesa</a></li>';
                    echo '<li><a href="../theme.php">Theme</a></li>';
                }else if (strpos($self,"admin/")) {
                    echo '<li><a href="../index.php">Home</a></li>';
                    echo '<li><a href="../mesa.php">Mi Mesa</a></li>';
                    echo '<li><a href="../theme.php">Theme</a></li>';
                }else{
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li><a href="mesa.php">Mi Mesa</a></li>';
                    echo '<li><a href="theme.php">Theme</a></li>';
                }
            ?>
              
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Heelp Me!! <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a target="_blank" href="http://librosweb.es/libro/bootstrap_3/capitulo_2.html">Manual Bootstrap</a></li>
                <li><a target="_blank" href="http://getbootstrap.com/getting-started/">Bootstrap Getting Started</a></li>
                <li><a target="_blank" href="http://getbootstrap.com/css/">Bootstrap Css</a></li>
                <li><a target="_blank" href="http://getbootstrap.com/components/">Bootstrap Components</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Otros</li>
                <li><a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/"><i class="fa fa-flag" aria-hidden="true">&nbsp;</i>FontAwesome</a></li>
                <li><a target="_blank" href="/phpmyadmin"><i class="fa fa-server" aria-hidden="true">&nbsp;</i>phpmyadmin</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right"> 
            <?php
            if(isset($_SESSION['user'])){
                if (strpos($self,"user/")) {
                    echo '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hola, '.ucfirst($value['nickname']).'! <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a target="_blank" href="../user/">Configuración</a></li>
                          <li role="separator" class="divider"></li>
                          <li class="dropdown-header">Otros</li>
                          <li><a target="_self" href="../logout.php"><i class="fa fa-server" aria-hidden="true">&nbsp;</i>Salir</a></li>
                        </ul>
                      </li>';
                }else if (strpos($self,"admin/")) {
                    echo '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hola, '.ucfirst($value['nickname']).'! <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a target="_blank" href="../user/">Configuración</a></li>
                          <li role="separator" class="divider"></li>
                          <li class="dropdown-header">Otros</li>
                          <li><a target="_self" href="../logout.php"><i class="fa fa-server" aria-hidden="true">&nbsp;</i>Salir</a></li>
                        </ul>
                      </li>';
                }else{
                    echo '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hola, '.ucfirst($value['nickname']).'! <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a target="_blank" href="user/">Configuración</a></li>
                          <li role="separator" class="divider"></li>
                          <li class="dropdown-header">Otros</li>
                          <li><a target="_self" href="logout.php"><i class="fa fa-server" aria-hidden="true">&nbsp;</i>Salir</a></li>
                        </ul>
                      </li>';
                }
                
            }else{
                if (strpos($self,"AniMasterV2/signup.php")) {
                    echo '  <li class="active"><a href="signup.php">Sign up</a></li>
                            <li><a href="login.php">Log in</a></li>';
                }else if (strpos($self,"AniMasterV2/login.php")) {
                    echo '  <li><a href="signup.php">Sign up</a></li>
                            <li class="active"><a href="login.php">Log in</a></li>';
                }else if (strpos($self,"user/")) {
                    echo '  <li><a href="../signup.php">Sign up</a></li>
                            <li><a href="../login.php">Log in</a></li>';
                }else if (strpos($self,"admin/")) {
                    echo '  <li><a href="../signup.php">Sign up</a></li>
                            <li><a href="../login.php">Log in</a></li>';
                }else{
                    echo '  <li><a href="signup.php">Sign up</a></li>
                            <li><a href="login.php">Log in</a></li>';
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
