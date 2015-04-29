<?php
    session_start();

    include_once("../utils.php");

    if(!isset($_SESSION['email']) or !isset($_SESSION['logged_in']) or !isset($_SESSION['admin'])) {
        header('Location: ../login');
    }
    if ($_SESSION['logged_in'] != true) {
        header('Location: ../login');
    }
    if ($_SESSION['admin'] != true) {
        header('Location: ../login');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vaultd Premium Storage Service</title>
<link rel="icon" href="img/favicon.png">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/main.min.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Asap' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
<link rel="icon" href="../img/favicon.png">
<noscript>
    <div class="row text-center col-md-6 col-md-offset-3">
        <h3>Please Enable JavaScript</h3>
        <p>You must <a href="//enable-javascript.com" target="_blank">enable JavaScript</a> to fully use the Vaultd site.</p>
        <div class="spacer"></div>
    </div>
</noscript>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script src="../js/bootstrap.min.js"></script>


    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
    <script src="js/admin.js"></script>
    <base href="/admin/">
</head>
<body ng-app="vaultdadminapp">
<style>
    td {
        padding: 6px;
    }
</style>
    <?php include_once( "../error.php"); ?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
            </div>
            <div id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="../boxes" title="leave admin">&#10006;</a></li>
                    <li><a href="qr">QR code</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-left: 30px;">
                    <li><a href="users">users</a></li>
                    <li><a href="boxes">boxes</a></li>
                    <li><a href="items">items</a></li>
                    <li><a href="orders">orders</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div ng-view></div>
</body>
</html>