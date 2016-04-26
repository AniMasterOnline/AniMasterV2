<!-- Header content box -->
<?php 
$title='Index';
$migas='#Index|index.php';
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
    });
</script>

<!-- Body content box -->
<div id="wrapper">
        <!-- Sidebar -->
        <div class="bg-color2" id="sidebar-wrapper">
            <div id="chat-container">
                
            </div>
            <div id="chat-box">
                
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div  id="page-content-wrapper">
            <div class="container-fluid ">
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#">Home</a></li>
                        <li role="presentation"><a href="#">Profile</a></li>
                        <li role="presentation"><a href="#">Messages</a></li>
                        <li role="presentation" class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Dropdown <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                          </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="row" >
                    <div class="col-md-12 col-lg-7 bg-color1" id="mesa-container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>User Panel</h1>
                                <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                            </div>
                        </div>
                        <div class="clearfix visible-xs"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="map">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-12 col-lg-5 bg-color2">
                        <h1>Right Panel</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

