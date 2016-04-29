<!-- User Menu -- Header content box -->
<?php 
$title='Mesa';
$migas='#Home|../../index.php#Configuración#Mesa|../../settings/table/';
include "../../Public/layouts/head.php";?>

<!-- Body content box -->
<div class="container-fluid ">
    <div class="row" >
        <div class="col-md-3 col-margin">
            <div class="row">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <?php
                            if($value['imagen'] == ""){
                                echo '<img src="../../Public/img/login.png" alt="...">';
                            }else{
                                echo '<img src="../../Public/img/usuarios/'.$value['imagen'].'" alt="...">';
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
        <div class="col-md-9 col-margin">
            <div class="row">
                <div class="col-md-4">
                        <div class="image-box style-2 mb-20 bordered dark-bg">
                                <div class="overlay-container overlay-visible">
                                        <img src="portfolio-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>										
                                </div>
                                <div class="body">
                                        <h3>Project Title</h3>
                                        <div class="separator-2"></div>
                                        <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> Feb, 2015&nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Web Design</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                        <a href="#" class="btn btn-gray-transparent btn-sm margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="image-box style-2 mb-20 bordered dark-bg">
                                <div class="overlay-container overlay-visible">
                                        <img src="portfolio-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>										
                                </div>
                                <div class="body">
                                        <h3>Project Title</h3>
                                        <div class="separator-2"></div>
                                        <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> Feb, 2015&nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Web Design</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                        <a href="#" class="btn btn-gray-transparent btn-animated btn-sm margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="image-box style-2 mb-20 bordered dark-bg">
                                <div class="overlay-container overlay-visible">
                                        <img src="portfolio-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>										
                                </div>
                                <div class="body">
                                        <h3>Project Title</h3>
                                        <div class="separator-2"></div>
                                        <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> Feb, 2015&nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Web Design</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                        <a href="#" class="btn btn-gray-transparent btn-animated btn-sm margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                        </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="col-md-4">
                        <div class="image-box style-2 mb-20 bordered dark-bg">
                                <div class="overlay-container overlay-visible">
                                        <img src="portfolio-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>										
                                </div>
                                <div class="body">
                                        <h3>Project Title</h3>
                                        <div class="separator-2"></div>
                                        <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> Feb, 2015&nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Web Design</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                        <a href="#" class="btn btn-gray-transparent btn-animated btn-sm margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="image-box style-2 mb-20 bordered dark-bg">
                                <div class="overlay-container overlay-visible">
                                        <img src="portfolio-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>										
                                </div>
                                <div class="body">
                                        <h3>Project Title</h3>
                                        <div class="separator-2"></div>
                                        <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> Feb, 2015&nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Web Design</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                        <a href="#" class="btn btn-gray-transparent btn-animated btn-sm margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="image-box style-2 mb-20 bordered dark-bg">
                                <div class="overlay-container overlay-visible">
                                        <img src="portfolio-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>										
                                </div>
                                <div class="body">
                                        <h3>Project Title</h3>
                                        <div class="separator-2"></div>
                                        <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> Feb, 2015&nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Web Design</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                        <a href="#" class="btn btn-gray-transparent btn-animated btn-sm margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                        </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="col-md-4">
                        <div class="image-box style-2 mb-20 bordered dark-bg">
                                <div class="overlay-container overlay-visible">
                                        <img src="portfolio-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>										
                                </div>
                                <div class="body">
                                        <h3>Project Title</h3>
                                        <div class="separator-2"></div>
                                        <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> Feb, 2015&nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Web Design</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                        <a href="#" class="btn btn-gray-transparent btn-animated btn-sm margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="image-box style-2 mb-20 bordered dark-bg">
                                <div class="overlay-container overlay-visible">
                                        <img src="portfolio-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>										
                                </div>
                                <div class="body">
                                        <h3>Project Title</h3>
                                        <div class="separator-2"></div>
                                        <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> Feb, 2015&nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Web Design</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                        <a href="#" class="btn btn-gray-transparent btn-animated btn-sm margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="image-box style-2 mb-20 bordered dark-bg">
                                <div class="overlay-container overlay-visible">
                                        <img src="portfolio-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link"><i class="fa fa-link"></i></a>										
                                </div>
                                <div class="body">
                                        <h3>Project Title</h3>
                                        <div class="separator-2"></div>
                                        <p class="small mb-10"><i class="fa fa-calendar" aria-hidden="true"></i> Feb, 2015&nbsp; <i class="fa fa-tag" aria-hidden="true"></i> Web Design</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque ipsam nihil, adipisci rem minus? Voluptatem distinctio laborum porro aspernatur.</p>
                                        <a href="#" class="btn btn-gray-transparent btn-animated btn-sm margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                        </div>
                </div>
                <div class="clearfix"></div>
        </div>
        </div>
    </div>
</div>

<?php include "../../Public/layouts/footer.php";?> 

