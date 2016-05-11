<!-- Header content box -->
<?php 
$title='Nom Partida';
$migas='#Index|index.php#Zona roleo';
include "Public/layouts/head.php";?>
<LINK HREF="Public/css/mesa.css" rel="stylesheet">
<script src="Public/js/chat.js"></script>

<style>
    .navbar{
        margin-bottom: 0;
    }
</style>

<!-- Menu Toggle Script -->
<script>
</script>
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
            <div id="chat-container" class="c-overflow">
                <div class="chatbox pull-left f-11 text-center system">
                    <span>
                        ¡Inicio de la sesion de roleo!
                    </span>
                </div>
                <div class="  "></div>
                <div class="chatbox pull-left">
                    <span>
                        <span class="f-14 f-700">Guardia</span><br>
                        Eh, eh, ¡cuidado con esa magia!
                    </span>
                </div>
                <div class="chatbox pull-left">
                    <span>
                        Vete a lanzar tus preciosos hechizos a otra parte
                    </span>
                </div>
                <div class="chatbox pull-right me">
                    <span>
                        ¡No  me grites que me pones los pelos de punta!
                    </span>
                </div>
                <div class="chatbox pull-left">
                    <span>
                        <span class="f-14 f-700">Jacob</span><br>
                        Espera, ya a tí te conozco ...... 
                        No me equivoco, estás en busca y captura. 
                        Ya es hora que pagues por tus crímenes
                    </span>
                </div>
                <div class="chatbox pull-right me">
                    <span>
                        Lo lamento… pero te equivocas, no soy mas que un pobre mago que va por el mundo sin rumbo ...
                    </span>
                </div>
                <div class="chatbox pull-left">
                    <span>
                        <span class="f-14 f-700">Master</span><br>
                        En ese momento, el guardia sin creer el la palabra del joven mago desenfunda su espada y se dispone a apresar al joven.
                    </span>
                </div>
                <div class="chatbox pull-right me">
                    <span>
                        Os lo prometo os estais equivocando ... puede que sea mago pero eso no me convierte en un bandido.
                    </span>
                </div>
                <div class="chatbox pull-right me">
                    <span>
                        Ademas ese echizo solo fue para iluminar ya que se esta oscureciendo ... D:
                    </span>
                </div>
                <div class="chatbox pull-left">
                    <span>
                        <span class="f-14 f-700">Jacob</span><br>
                        Bueno quizas tengas razon en eso, pero igual el uso de la magia esta prohibido en estas tierras ....
                    </span>
                </div>
                <div class="chatbox pull-left">
                    <span>
                        enfin se puede saber hacia donde te dirijes ?
                    </span>
                </div>
                <div class="chatbox pull-right me">
                    <span>
                        Solo estoy de paso, aunque voy de camino hacia "Gabriel"
                    </span>
                </div>
                <div class="chatbox pull-right me">
                    <span>
                        En unas semanas va a haber un evento por algo nuevo que se ha construido y me gustaria asistir.
                    </span>
                </div>
                <div class="chatbox pull-left">
                    <span>
                        <span class="f-14 f-700">Master</span><br>
                        Al acercarse la noche, de entre los arbustos sale un lobo y os ataca.
                    </span>
                </div>
                <div class="chatbox pull-left f-11 text-center battle">
                    <span>
                        ¡Inicio de Batalla!
                    </span>
                </div>
                <div class="chatbox pull-left f-11 battle2">
                    <span>
                        <span class="f-12 f-700">Enemy1 > Jacob : </span>
                        -35Pdv
                    </span>
                </div>
                <div class="chatbox pull-left f-11 battle2">
                    <span>
                        <span class="f-12 f-700">Jacob > Enemy1 : </span>
                        -35Pdv
                    </span>
                </div>
                <div class="chatbox pull-left f-11 battle2 bgm-lightblue">
                    <span>
                        <span class="f-12 f-700">Yo > Enemy1 : </span>
                        -65Pdv
                    </span>
                </div>
                <div class="chatbox pull-left f-11 battlekill">
                    <span>
                        <span class="f-12 f-700">Enemy1 is Death</span>
                    </span>
                </div>
                <div class="chatbox pull-left f-11 text-center battle">
                    <span>
                        ¡Fin de Batalla!
                    </span>
                </div>
                
            </div>
            <div id="chat-box" class="z-depth-1-top bgm-gray lv-footer ms-reply p-0 b-0" >
                <textarea placeholder="What's on your mind..."></textarea>
                <button><i class="zmdi zmdi-mail-send"></i></button>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        
        <!-- Page Content -->
        <div  id="page-content-wrapper">
            <div class="container-fluid">
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
                          </ul>
                        </li>
                    </ul>
                </div>
                <div class="row" >
                    <div class="col-md-12 bgm-white z-depth-1-bottom" id="mesa-container">
                        <!-- Tab panes -->
                        <div class="tab-content ">
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

