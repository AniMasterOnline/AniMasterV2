<!-- Header content box -->
<?php 
$title='Login';
$migas='#Index|index.php#Support';
include "Public/layouts/head.php";?>

<style>
.warningMsg {
    background: #ff4500 url("http://cdn1.iconfinder.com/data/icons/crystalproject/128x128/apps/alert.png") no-repeat 10px center;
    border: 5px solid #8b0000;
    padding: 10px 10px 10px 150px;
}

.notificationLevel {
    color: white;
    display: block;
    padding: 10px;
    text-align: center;
    text-decoration: none;
}

.notificationLevel.default {
    background: orange;
}

.notificationLevel.allowed {
    background-color: green;
}

.notificationLevel.denied {
    background-color: red;
}

.step {
    margin: 10px;
}

.step header {
    border-bottom: 1px solid #ff4500;
    font-size: 1.4em;
    text-align: center;
}

.step .block {
    background: rgba(255, 69, 0, 0.5);
    display: inline-block;
    height: 100px;
    min-width: 100px;
    vertical-align: top;
}

.step .block label {
    display: block;
}
</style>
<!-- Body box -->
<div class="warningMsg" data-ng-show="!isSupported" style="display: none;">
        Desktop notifications are currently not supported for your browser.
        <p>
        Open the page in Chrome(version 23+), Safari(version6+), Firefox(with ff-html5notifications plugin installed) and IE9+.
</div>
<a class="notificationLevel" ng-class="getClassName()" data-ng-click="requestPermissions()" data-ng-pluralize data-count="permissionLevel" when="{
'0': 'Notifications allowed.',
'1': 'Notifications not allowed. (click to enable)',
'2': 'Notifications denied. (Change notifications permission in you browser\'s settings)'}">
</a>
<button onclick="show()">Show notification</button>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

