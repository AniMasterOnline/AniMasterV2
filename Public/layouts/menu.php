<?php
	session_start();
	if(isset($_SESSION['user'])){
		$value=$_SESSION['user'];
		var_dump($value);
	}
	function migasdepan($migas){
		$migasdepan = explode("#",$migas);
		$contmigas = count($migasdepan);
		
		echo '&nbsp; <i class="fa fa-home"></i> <i class="fa fa-angle-right"></i>';
		for ($i = 0; $i < $contmigas; $i++){
			$pan = explode("|", $migasdepan[$i]);
			if ($i <= 1){
				if(count($pan) == 2){
					echo '<a href="'.$pan[1].'"> '.$pan[0].'</a> ';
				}else{
					echo '<a> '.$pan[0].'</a> ';
				}
			}else{
				if(count($pan) == 2){
					echo '<i class="fa fa-angle-right"></i><a href="'.$pan[1].'"> '.$pan[0].'</a> ';
				}else{
					echo '<i class="fa fa-angle-right"></i><a> '.$pan[0].'</a> ';
				}
			}
		}
	}
?>
<nav class="navbar navbar-inverse navbar-static-top">
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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="mesa.php">Mi Mesa</a></li>
            <li><a href="theme.php">Theme</a></li>
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
            <li><a href="#">SigIn</a></li>
            <li><a href="#">LogIn</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <?php
		//migasdepan($migas);
      ?>
