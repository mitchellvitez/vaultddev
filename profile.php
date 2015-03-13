<?php include_once("utils.php"); 
header("Access-Control-Allow-Origin: *");
session_start();
if(!isset($_SESSION['email']) or !isset($_SESSION['logged_in'])) {
        header('Location: login');
    }
    if ($_SESSION['logged_in'] != true) {
        header('Location: login');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("head.php"); ?>
    <?php include("scripts.php"); ?>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
    <script src="js/ang.js"></script>
    <base href="/">
</head>
<body ng-app="vaultdapp">
    <?php include_once( "error.php"); ?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
            </div>
            <div id="navbar">
                <ul class="nav navbar-nav">
                  <li><a href="//vaultdstorage.com">Home</a></li>
                    <li><a href="mailto:info@vaultdstorage.com">Email us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-left: 30px;">
                    <li><a href="profile">Profile</a>
                    </li>
                    <li><a href="boxes">My Boxes</a>
                    </li>
                    <li><a href="order">Order Boxes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div ng-view></div>
</body>
</html>

<?php session_start();
    if (isset($_SESSION['thanks']) and $_SESSION['thanks'] == 'order') { 
      unset($_SESSION['thanks']);
      $boxnum = $_SESSION['boxnum'];
      unset($_SESSION['boxnum']);
      $deliverydate = $_SESSION['deliverydate'];
      unset($_SESSION['deliverydate']);
      $pickupdate = $_SESSION['pickupdate'];
      unset($_SESSION['pickupdate']);
    ?>

    <div class="modal fade" id="thankyou" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Thank You!</h4>
          </div>
          <div class="modal-body">
            <p>Thank you for your order of <?= $boxnum; ?> boxes.</p>
            <p>You will receive them on <?= date("F jS", strtotime($deliverydate)); ?>.</p>
            <p>We will retrieve the filled boxes on <?= date("F jS", strtotime($pickupdate)); ?>.</p>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript">
        $(window).load(function(){
            $('#thankyou').modal('show');
        });
    </script>

  <?php } ?>