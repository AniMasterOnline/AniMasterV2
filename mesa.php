<!-- Header content box -->
<?php 
$title='Index';
$migas='#Index|index.php';
include "Public/layouts/head.php";?>
<style>
    .navbar{
        margin-bottom: 0;
    }
    #sidebar.affix-top {
    position: static;
    margin-top:30px;
    width:228px;
  }

  #sidebar.affix {
    position: fixed;
    top:70px;
    width:228px;
  }
</style>
<!-- Body content box -->
<div class="container-fluid theme-showcase" role="main"> <!-- container Start -->
    <div class="row-fluid">
        <div class="col-md-9 bg-color1" id="mainCol">
            aaa
        </div>
        <div class="col-md-3 bg-color2" id="leftCol">
            <ul class="nav nav-stacked" id="sidebar">
              <li><a href="#sec0">Section 0</a></li>
              <li><a href="#sec1">Section 1</a></li>
              <li><a href="#sec2">Section 2</a></li>
              <li><a href="#sec3">Section 3</a></li>
              <li><a href="#sec4">Section 4</a></li>
            </ul>
      	</div> 
    </div> 
</div><!-- /container -->

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

