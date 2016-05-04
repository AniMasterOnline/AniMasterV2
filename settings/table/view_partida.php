<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id_partida = $_GET['id'];
        
        require_once "../../System/Classes/Partida.php";
        $partida= new Partida();  
        $partida= $partida->viewPartida($id_partida);
        
        $nombre = $partida->getNombre();
        $imagen = $partida->getImagen();
        $descripcion = $partida->getDescripcion();
        $anyo = $partida->getAnyo();
        $nv_sobrenatural = $partida->getNv_Sobrenatural();
        $limite = $partida->getLimite();
        $token = $partida->getToken();
        
    }else{
        echo '<META http-equiv="refresh" content="0;URL=index.php">';
    }
?>
<?php 
$title='Mesa';
$migas='#Home|../../index.php#Mesa|../../settings/table/';
include "../../Public/layouts/head.php";?>


<!-- Body content box -->
<div class="container">
    <div class="card">
        <div class="lv-header-alt clearfix m-b-5">
            <h2 class="lvh-label hidden-xs"><?php echo ''.$nombre; ?></h2>
            <ul class="lv-actions actions">
                <li>
                    <a href="#">
                        <i class="zmdi zmdi-info"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="#">Refresh</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="card-body card-padding">
            
        </div>
    </div>
    <div class="card">
        <div class="lv-header-alt clearfix m-b-5">
            <h2 class="lvh-label hidden-xs">  </h2>
            <ul class="lv-actions actions">
                <li>
                    <a href="#">
                        <i class="zmdi zmdi-info"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="#">Refresh</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="card-body card-padding">
            
        </div>
    </div>
 
    
    
    
</div>
<?php include "../../Public/layouts/footer.php";?> 
