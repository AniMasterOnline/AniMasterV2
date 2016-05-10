<!-- Home -- Header content box -->
<?php 
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit 
            anim id est laborum.
                
          </p>
          <p class="lead">
              <a href="partida.php" class="btn btn-primary b-0 bgm-red">Empieza ya ...</a>
          </p>
    </div>
</div>
<script>
$(document).ready(function(){
    var i = 0;
    var url = "https://api.flickr.com/services/feeds/photos_public.gne?id=90380536@N06&format=json&per_page=10&jsoncallback=?";
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




