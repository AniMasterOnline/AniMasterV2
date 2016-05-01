<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php#Zona roleo';
include "Public/layouts/head.php";?>

<script>
    $(document).ready(function(){

    });
</script>
<!-- Body box -->
<div class="container">
    <div class="page-header" style="margin-top: -15px;">
        <div class="input-group z-depth-1-bottom b-0">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
            </span>
        </div><!-- /input-group -->
    </div>
    <div class="search-container">
        
    </div>
    <nav class="navbar navbar-default bgm-brown z-depth-2 b-0">
        <div class="container" style="text-align: center;">
            <ul class="pagination" >
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

