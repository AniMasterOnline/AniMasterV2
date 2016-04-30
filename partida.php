<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php#Partidas de rol';
include "Public/layouts/head.php";?>
<script>
        $(document).ready(function(){
            $("#jmbTrn").click(function(e){
              $(this).hide();
            });
            var counter = 0;
            var interval = setInterval(function() {
                counter++;
                console.log(counter);
                // Display 'counter' wherever you want to display it.
                if (counter == 5) {
                    // Display a login box
                    $("#jmbTrn").remove();
                    clearInterval(interval); // stop the interval
                }
            }, 1000);
        });
</script>
<!-- Body box -->
<div class="container">
    <div class="page-header" style="margin-top: -15px;">
        <div id="jmbTrn" class="jumbotron">
            <h1>Hello, world!</h1>
            <p>...</p>
        </div>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
            </span>
        </div><!-- /input-group -->
    </div>
    <div class="search-container">
        
    </div>
    <nav class="navbar navbar-default ">
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

