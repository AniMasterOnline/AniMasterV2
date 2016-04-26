<!-- Header content box -->
<?php 
$title='Index';
$migas='#Home';
include "Public/layouts/head.php";?>
<style>
    body{
        background-color: rgba(0,0,0,0.8);
        position: absolute;
        top:0;
        bottom: 0;
        left:0;
        right: 0;
    }
    html{
        background-color: #31231E;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center top;
        background-attachment: fixed;
        
    }
    #slider{
        display:none;
    }
</style>
<div id="slider"></div>

<!-- Body content box -->
<div class="cover-container text-center">

    <div class="inner cover">
          <h1 class="cover-heading text-title">AniMaster tu web de Rol Online.</h1>
          <p class="lead text-white">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
          <p class="lead">
              <a href="subhasta.php" class="btn btn-primary">Empieza ya ...</a>
          </p>
    </div>

    <div class="mastfoot">
      <div class="inner text-white text-">
        <p> <a href="#">AniMaster Online</a>, by <a href="#">@Grup2</a>.</p>
      </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var i = 0;
    var url = "https://api.flickr.com/services/feeds/photos_public.gne?id=90380536@N06&format=json&per_page=20&jsoncallback=?";
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




