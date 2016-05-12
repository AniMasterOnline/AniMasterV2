<?php
$title='404! Not Found :c';
$migas='#Home|../../index.php#404! You can\'t pass';
require_once "../../Public/layouts/head.php";
    echo '  <div class="alert alert-inverse m-b-0" style="border-radius:0px;">
                <img src="../../Public/img/404.png" height="32" width="32">
                <strong>404!</strong> you can\'t pass.
            </div>
            <button class="btn bgm-purple c-white w-100 z-depth-1 f-16 f-400" onclick="goBack()" style="border-radius:0px;" >Volver !</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>';
exit();
?>

