<!-- Home -- Header content box -->
<?php
require_once 'System/config.php';
if(FLAG == 0){
    header('location: install.php');
}
$title='Home';
include "Public/layouts/head.php";?>

<style>
    body{
        background-color: rgba(0,0,0,0.7);
        position: absolute;
        top:0;
        bottom: 0;
        left:0;
        right: 0;
    }
    html{
        background-color: #9E9E9E;
        background-position: center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%; 
        overflow: hidden;
        
    }
    #slider{
        display:none;
    }
    .lead{
        padding-left: 30px;
        padding-right: 30px;
    }
</style>
<div id="slider"></div>

<!-- Body content box -->
<div class="cover-container text-center">

    <div class="inner cover">
          <h1 class="cover-heading text-title c-yellow">AniMaster tu web de Rol Online.</h1>
          <p class="lead c-white">
              <strong>Bienvenido a AniMaster Online</strong>
              <br>Esta es una web dedicada a un juego de rol la qual sirve de herramienta para facilitar 
              la comunicación entre diversos usuarios de este juego y poder llevar acabo tus propias aventuras.
              <br><br>El juego de rol Anima: Beyond Fantasy y el mundo de Gaia te sumergen en una ambientación de 
              fantasía que combina lo místico con lo realista, la verdad con las mentiras y la luz con las tinieblas
              <br>
          </p>
          <p class="lead">
              <div class="btn-group ">
                    <a target="_blank" class="btn btn-primary bgm-deeppurple b-0" href="http://www.edgeent.com/libros/coleccion/anima_beyond_fantasy">Anima Edge Tienda</a>
                    <a href="partida.php" class="btn btn-primary b-0 bgm-red">Empieza tu aventura</a>
                    <a target="_blank" class="btn btn-primary bgm-indigo b-0" href="http://www.edgeent.com/foro/anima_beyond_fantasy">Anima Edge Foros</a>
              </div>
          </p>
    </div>
</div>
<script>
$(document).ready(function(){
    var i = 0;
    var url = "https://api.flickr.com/services/feeds/photos_public.gne?id=90380536@N06&format=json&per_page=5&jsoncallback=?";
    $.getJSON(url, function(data){
        var html = "";
        $.each(data.items, function(i, item){
            html += "<img src=" + item.media.m.replace('_m', '_b') + ">";
        });
        $("#slider").html(html);
        cambiarSlider();
        var control = setInterval(cambiarSlider, 8000);
    });
    function cambiarSlider(){
            i++;
            
            if(i == $("#slider img").size()){
                    i = 0;
            }
            //
            //$("#slider img").hide();
            var src = $("#slider img").eq(i).attr('src');
            $('html').css('backgroundImage','url('+src+')');
            $('html').css('transition','background-image 0.8s ease-in-out');
            //$("#slider img").eq(i).fadeIn(2000);
    }
});
</script>
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




