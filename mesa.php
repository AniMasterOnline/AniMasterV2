<!-- Header content box -->
<?php 
$title='Nom Partida';
include "Public/layouts/head.php";?>
<LINK HREF="Public/css/mesa.css" rel="stylesheet">
<style>
    .navbar{
        margin-bottom: 0;
    }
</style>
<!-- Menu Toggle Script -->
<script>
    $( document ).ready(function() {
        console.log( "ready!" );
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $("#magia").attr("disabled", "disabled");
        $("#ki").attr("disabled", "disabled");
    });
</script>

<!-- Body content box -->
<div id="wrapper" >
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="bgm-gray">
            <div id="chat-container" class="c-overflow bgm-blue">
                a<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>a<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>b<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>b
            </div>
            <div id="chat-box" class="bgm-black" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group input-group-sm dropup">
                            <input type="text" class="form-control" aria-label="Text input with segmented button dropdown"> 
                            <div class="input-group-btn"> 
                                <button type="button" class="btn btn-success">Enviar <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button> 
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                    <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> 
                                </button> 
                                <ul class="dropdown-menu dropdown-menu-right"> 
                                    <li><a href="#">Action</a></li> 
                                    <li><a href="#">Another action</a></li> 
                                    <li><a href="#">Something else here</a></li> 
                                    <li role="separator" class="divider"></li> 
                                    <li><a href="#">Separated link</a></li> 
                                </ul> 
                            </div> 
                        </div>
                    </div><!-- /.col-lg-6 -->
                </div>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        
        <!-- Page Content -->
        <div  id="page-content-wrapper">
            <div class="container-fluid ">
                <div class="row">
                    <ul class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active"><a href="#personaje" aria-controls="personaje" role="tab" data-toggle="tab">Personaje</a></li>
                        <li role="presentation"><a href="#habilidades" aria-controls="habilidades" role="tab" data-toggle="tab">Habilidades</a></li>
                        <li role="presentation"><a href="#combate" aria-controls="combate" role="tab" data-toggle="tab">Combate</a></li>
                        <li role="presentation"><a href="#equipo" aria-controls="equipo" role="tab" data-toggle="tab">Equipo</a></li>
                        <li role="presentation" class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Otros <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                                <li role="presentation"><a href="#mapa" aria-controls="mapa" role="tab" data-toggle="tab">Mapa</a></li>
                                <li role="presentation"><a href="#batalla" aria-controls="batalla" role="tab" data-toggle="tab">Batalla</a></li>
                                <li role="presentation"><a href="#diario" aria-controls="diario" role="tab" data-toggle="tab">Diario del Jugador</a></li>
                                <li role="separator" class="divider"></li>
                                <li role="presentation" class="disabled"><a id="magia" href="#">Magia</a></li>
                                <li role="presentation" class="disabled"><a id="ki" href="#">Ki</a></li>
                          </ul>
                        </li>
                    </ul>
                </div>
                <div class="row" >
                    <div class="col-md-12 bgm-white" id="mesa-container">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="personaje">
                                <div class="row">
                                    <div class="col-md-12">
                                            <h1>Personaje <small>Subtext for header</small></h1>
                                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade " id="habilidades">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <h1>Habilidades</h1>
                                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade " id="combate">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <h1>Combate</h1>
                                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade " id="equipo">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <h1>Equipo</h1>
                                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade " id="mapa">
                                <div class="row">
                                  <div class="col-md-12">
                                      <div id="map">
                                          
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade " id="batalla">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <h1>Registro de batalla</h1>
                                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade " id="diario">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <h1>Diario del jugador</h1>
                                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        

    </div>
    <!-- /#wrapper -->

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

