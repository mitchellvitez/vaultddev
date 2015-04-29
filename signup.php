<?php
session_start();  
if(isset($_SESSION['email']) and isset($_SESSION['logged_in'])) {
  if ($_SESSION['logged_in'] == true) {
    header('Location: boxes');
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
        
        <div class="col-md-offset-2 col-md-4">
            <form method="post" action="signupverify">
            <input type="hidden" name="signup" id="signup" value="true">
            <div class="form-group">
                <label for="name">Full name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Adrian Vaultdbox" required="required">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="vaultduser@email.com" required="required">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password" required="required">
              </div>
              <div class="form-group">
                <label for="password2">Password again</label>
                <input type="password" class="form-control" name="password2" id="password2" placeholder="password" required="required">
              </div>
              <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="867-5309" required="required">
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                <label for="address1">Address</label>
                <input type="text" class="form-control" name="address1" id="address1" placeholder="123 Main St." required="required">
                <input type="text" class="form-control" name="address2" id="address2" placeholder="Apt. 314">
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Ann Arbor" required="required">
              </div>
              <div class="form-group">
                <label for="zip">Zip code</label>
                <input type="text" class="form-control" name="zip" id="zip" placeholder="00000" required="required">
              </div>
              <div class="form-group">
                <label for="" or="state">State</label>
                <input type="text" class="form-control" name="state" id="state" placeholder="MI" required="required">
              </div>
              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" id="country" placeholder="USA" required="required">
              </div>
            </div>

              <div class="checkbox col-md-offset-4 col-md-4">
                <p><label>
                  <input type="checkbox" name="update"> Receive occasional email updates
                </label> &nbsp; &nbsp; 
                <label>
                  <input type="checkbox" required="required" name="terms"> I agree to <a target="_blank" href="terms">Terms of Service</a>
                </label></p>
              
              <p><input class="center-block btn btn-success" type="submit" name="submit" value="Sign Up" required="required"></p>

              </div>
            </form>
        </div>
    </div>
</body>
</html>
