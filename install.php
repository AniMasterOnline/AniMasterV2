<?php
$title='Install Animaster';
$migas='#Home|index.php#Install|install.php';
require_once "Public/layouts/head.php";
set_time_limit(300);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 m-t-0">
            <h2>Animaster <small>Install menu</small></h2>
            <form method="post" class="m-b-20" autocomplete="false" action="install.php">
                <fieldset class="form-group">
                  <label for="exampleInputEmail1">Host</label>
                  <input type="text" class="form-control" placeholder="..." name="Host">
                  <small class="text-muted">Example: localhost</small>
                </fieldset>
                <fieldset class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" placeholder="..." name="DBuser">
                </fieldset>
                <fieldset class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" placeholder="..." name="DBpass">
                </fieldset>
                <fieldset class="form-group">
                  <label for="exampleInputPassword1">Database Name</label>
                  <input type="text" class="form-control" placeholder="..." name="DBname">
                </fieldset>
                <button type="submit" class="btn btn-primary">Install</button>
            </form>
        
        <?php
            require_once 'System/config.php';
            if(FLAG == 0){
                if(isset($_POST['Host']) && isset($_POST['DBuser']) && isset($_POST['DBpass']) && isset($_POST['DBname'])){
                    $HOST = $_POST['Host'];
                    $NOMUSUARI = $_POST['DBuser'];
                    $CONTRASENYA = $_POST['DBpass'];
                    $NOMBDD = $_POST['DBname'];
                    
                    // Create and Load DB
                    $con = new mysqli($HOST,$NOMUSUARI,$CONTRASENYA);
                    if (!$con){
                        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
                    }
                    if (mysqli_num_rows($con->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '". $NOMBDD ."'"))) {
                        echo '  <div class="alert alert-inverse m-b-0" style="border-radius:0px;">
                                <img src="Public/img/404.png" height="32" width="32">
                                Database '.$NOMBDD.' already exists.
                            </div>';

                    }else {
                        // Create database
                        $con->query("SET NAMES 'utf8'");
                        $sql = "CREATE DATABASE ".$NOMBDD." DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci";
                        $con->query($sql);
                        $usedb = "USE `".$NOMBDD."`;";
                        $con->query($usedb);
                        $sql_file = 'System/localhost.sql';
                        run_sql_file($sql_file, $con);
                        writefile($HOST, $NOMUSUARI, $CONTRASENYA, $NOMBDD);
                        echo '  <div class="alert alert-inverse m-b-0" style="border-radius:0px;">
                                Database '.$NOMBDD.' created successfully.
                            </div>
                            <button class="btn bgm-purple c-white w-100 z-depth-1 f-16 f-400" onclick="goBack()" style="border-radius:0px;" >Volver !</button>
                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>';
                                    }
                    $con->close();
                }
            }else{
                echo '  <div class="alert alert-inverse m-b-0" style="border-radius:0px;">
                            <img src="Public/img/404.png" height="32" width="32">
                            <strong>404!</strong> This website has been installed already.
                        </div>
                        <button class="btn bgm-purple c-white w-100 z-depth-1 f-16 f-400" onclick="goBack()" style="border-radius:0px;" >Volver !</button>
                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>';
            }

            function writefile($HOST, $NOMUSUARI, $CONTRASENYA, $NOMBDD){
                // Create config.php
                $myfile = fopen("System/config.php", "w") or die("Unable to open file!");
                $txt = '<?php
                    define("FLAG","1");
                    define("HOST","'.$HOST.'");
                    define("NOMUSUARI","'.$NOMUSUARI.'");
                    define("CONTRASENYA","'.$CONTRASENYA.'");
                    define("NOMBDD","'.$NOMBDD.'");
                    class connexio extends mysqli {
                        public function __construct() {
                            parent::__construct(HOST,NOMUSUARI,CONTRASENYA,NOMBDD);
                            parent::query("SET NAMES \'utf8\'");
                            if (mysqli_connect_error()) {
                                die(\'Connect Error (\' . mysqli_connect_errno() . \') \'. mysqli_connect_error());
                            }
                        }
                    }
                ?>';
                fwrite($myfile, $txt);
                fclose($myfile);
            }

            function run_sql_file($location, $con){
                //load file
                $commands = file_get_contents($location);

                //delete comments
                $lines = explode("\n",$commands);
                $commands = '';
                foreach($lines as $line){
                    $line = trim($line);
                    if( $line && !startsWith($line,'--') ){
                        $commands .= $line . "\n";
                    }
                }

                //convert to array
                $commands = explode(";", $commands);

                //run commands
                $total = $success = 0;
                foreach($commands as $command){
                    if(trim($command)){
                        $success += ($con->query($command)==false ? 0 : 1);
                        $total += 1;
                    }
                }

                //return number of successful queries and total number of queries found
                return array(
                    "success" => $success,
                    "total" => $total
                );
            }
            // Here's a startsWith function
            function startsWith($haystack, $needle){
                $length = strlen($needle);
                return (substr($haystack, 0, $length) === $needle);
            }
        ?>
        </div>
    </div>
</div>


