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
    <?php include_once("navbar.php"); ?>
    <div ng-view></div>
</body>
</html>

<?php session_start();
    if (isset($_SESSION['thanks']) and $_SESSION['thanks'] == 'order') { 
      unset($_SESSION['thanks']);
      $boxnum = $_SESSION['boxnum'];
      unset($_SESSION['boxnum']);
      $itemnum = $_SESSION['itemnum'];
      unset($_SESSION['itemnum']);
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
            <p>Thank you for your order of <?= $boxnum; ?> boxes and <?= $itemnum; ?> items.</p>
            <p>You will receive them on <?= date("F jS", strtotime($deliverydate)); ?>, and we will retrieve the filled boxes on <?= date("F jS", strtotime($pickupdate)); ?>. We will contact you the day before dropping off the boxes to let you know the time we will arrive.</p>
            <p>Your Vaultd representative is Brett. Feel free to email him at <a href="mailto:brett@vaultdstorage.com">brett@vaultdstorage.com</a> with any questions or concerns.</p>
            <p>Once we store the boxes, they will show up on this page.</p>
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