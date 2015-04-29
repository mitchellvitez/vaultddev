<head>
    <?php include_once('head.php'); ?>
</head>

<body>
<?php include_once('navbar.php'); ?>

<div class="container">
    <div class="row text-center col-md-offset-5 col-md-2">
        <img class="img-responsive center-block" src="img/box.png">
    </div>
    </div>
<div class="col-md-4 col-md-offset-4 center text-center">

    <h1>Preorder Boxes</h1>
    <h3>Put $20 down now and receive 25% off your entire summer storage</h3><br>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="F33BGTY7NEDYW">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
</div>

</body>

<?php include_once('scripts.php'); ?>