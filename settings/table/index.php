<!-- User Menu -- Header content box -->
<?php 
$title='Mesa';
$migas='#Home|../../index.php#Configuración#Mesa|../../settings/table/';
include "../../Public/layouts/head.php";?>

<!-- Body content box -->
<div class="container">
    <div class="row" >
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <?php
                            if($value['imagen'] == ""){
                                echo '<img class="img-rounded" src="../../Public/img/login.png" alt="...">';
                            }else{
                                echo '<img class="img-rounded" src="../../Public/img/usuarios/'.$value['imagen'].'" alt="...">';
                            }
                        ?>
                        
                        <div class="caption ">
                            <h3 style="text-align: left;"><?php echo $value['nickname'];?><br><small>#<?php if($value['nombre'] == "" ){ echo ' =D'; }else{ echo $value['nombre'].' '.$value['apellido']; }?></small></h3>
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="../../settings/account/" class="list-group-item">Cuenta</a>
                        <a href="../../settings/password/" class="list-group-item">Contraseña</a>
                        <a href="../../settings/notifications/" class="list-group-item ">Mensajes</a>
                        <a href="../../settings/table/" class="list-group-item active">Mesa</a>
                        <a href="../../settings/characters/" class="list-group-item">Personajes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
            <div class="row">
                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 bordered dark-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="portfolio-3.jpg" alt="">	
                            <a href="#" class="overlay-link iwave"><i class="fa fa-share-alt fa-mesa"></i></a>
                        </div>
                        <div class="body">
                            <h3 style="margin-top: 0;">Title</h3>
                            <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Partida - 1</p>
                            <p class="text-muted"></p>
                            <a href="#" class="btn btn-primary btn-gray-transparent btn-sm margin-clear" style="width: 100%;">Crear partida<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 bordered dark-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="portfolio-3.jpg" alt="">
                            <a href="#" class="overlay-link"><i class="fa fa-share-alt fa-mesa"></i></a>
                        </div>
                        <div class="body">
                            <h3 style="margin-top: 0;">Title</h3>
                            <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Partida - 2</p>
                            <p class="text-muted"></p>
                            <a href="#" class="btn btn-primary btn-gray-transparent btn-sm margin-clear" style="width: 100%;">Crear partida<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 bordered dark-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="portfolio-3.jpg" alt="">
                            <a href="#" class="overlay-link"><i class="fa fa-share-alt fa-mesa"></i></a>
                        </div>
                        <div class="body">
                            <h3 style="margin-top: 0;">Title</h3>
                            <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Partida - 3</p>
                            <p class="text-muted"></p>
                            <a href="#" class="btn btn-primary btn-gray-transparent btn-sm margin-clear" style="width: 100%;">Crear partida<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 bordered dark-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="portfolio-3.jpg" alt="">
                            <a href="#" class="overlay-link"><i class="fa fa-share-alt fa-mesa"></i></a>								
                        </div>
                        <div class="body">
                            <h3 style="margin-top: 0;">Title</h3>
                            <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Partida - 4</p>
                            <p class="text-muted"></p>
                            <a href="#" class="btn btn-primary btn-gray-transparent btn-sm margin-clear" style="width: 100%;">Crear partida<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 bordered dark-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="portfolio-3.jpg" alt="">	
                            <a href="#" class="overlay-link"><i class="fa fa-share-alt fa-mesa"></i></a>
                        </div>
                        <div class="body">
                            <h3 style="margin-top: 0;">Title</h3>
                            <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Partida - 5</p>
                            <p class="text-muted"></p>
                            <a href="#" class="btn btn-primary btn-gray-transparent btn-sm margin-clear" style="width: 100%;">Crear partida<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 bordered dark-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="portfolio-3.jpg" alt="">	
                            <a href="#" class="overlay-link"><i class="fa fa-share-alt fa-mesa"></i></a>
                        </div>
                        <div class="body">
                            <h3 style="margin-top: 0;">Title</h3>
                            <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Partida - 6</p>
                            <p class="text-muted"></p>
                            <a href="#" class="btn btn-primary btn-gray-transparent btn-sm margin-clear" style="width: 100%;">Crear partida<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 bordered dark-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="portfolio-3.jpg" alt="">	
                            <a href="#" class="overlay-link"><i class="fa fa-share-alt fa-mesa"></i></a>
                        </div>
                        <div class="body">
                            <h3 style="margin-top: 0;">Title</h3>
                            <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Partida - 7</p>
                            <p class="text-muted"></p>
                            <a href="#" class="btn btn-primary btn-gray-transparent btn-sm margin-clear" style="width: 100%;">Crear partida<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 bordered dark-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="portfolio-3.jpg" alt="">	
                            <a href="#" class="overlay-link"><i class="fa fa-share-alt fa-mesa"></i></a>
                        </div>
                        <div class="body">
                            <h3 style="margin-top: 0;">Title</h3>
                            <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Partida - 8</p>
                            <p class="text-muted"></p>
                            <a href="#" class="btn btn-primary btn-gray-transparent btn-sm margin-clear" style="width: 100%;">Crear partida<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-box style-2 mb-20 bordered dark-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="portfolio-3.jpg" alt="">	
                            <a href="#" class="overlay-link"><i class="fa fa-share-alt fa-mesa"></i></a>
                        </div>
                        <div class="body">
                            <h3 style="margin-top: 0;">Title</h3>
                            <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Partida - 9</p>
                            <p class="text-muted"></p>
                            <a href="#" class="btn btn-primary btn-gray-transparent btn-sm margin-clear" style="width: 100%;">Crear partida<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
        </div>
        </div>
    </div>
</div>

<?php include "../../Public/layouts/footer.php";?> 

