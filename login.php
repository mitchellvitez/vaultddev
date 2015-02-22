<?php
session_start();
header("Access-Control-Allow-Origin: *");
if(isset($_SESSION['email']) and isset($_SESSION['logged_in'])) {
  if ($_SESSION['logged_in'] == true) {
    header('Location: profile');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once("head.php"); ?>
  <?php include("scripts.php"); ?>
</head>
<body>
  <?php include_once("error.php"); ?>
    <br>
    <div class="container">
    <div class="row text-center col-md-offset-5 col-md-2">
        <img class="img-responsive center-block" src="img/box.png" />
        <br>
    </div>
    </div>
    <div class="container">
        <div class="col-md-offset-4 col-md-4">
            <form method="post" action="loginverify">
            <input type="hidden" name="login" id="login" value="true">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="user@vaultdstorage.com" required="required">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password" required="required">
              </div>
              
              <p><input class="center-block btn btn-success" type="submit" name="submit" value="Log in" required="required"></p>

              
            </form>
            <div class="spacer"></div>
          <p class="text-center">Don't have an account? <a href="signup">Sign up</a></p>
          </div>
        </div>
    </div>
</body>
</html>
