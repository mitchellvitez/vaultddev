<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="canonical" href="https://www.vaultdstorage.com" />
  <?php include_once("head.php"); ?>
  <?php include("scripts.php"); ?>
</head>
<body style="overflow-x: hidden">
  <?php include_once("error.php"); ?>
  <?php 
    if (session_id() == "") {
      session_start();
    }
    if (isset($_SESSION['thanks'])) { 
      unset($_SESSION['thanks']);
    ?>

    <div class="modal fade" id="thankyou" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Thank You!</h4>
          </div>
          <div class="modal-body">
            <p>Thank you for your interest in Vaultd. We look forward to serving you.</p>
            <p>If you have questions or would like more information, please email <a href="mailto:info@vaultdstorage.com">info@vaultdstorage.com</a>.</p>
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


  <?php include_once("navbar.php"); ?>

<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<img class="img-responsive center-block" src="img/box.png" />
		<h3 class="text-center">Your closet away from home</h3>
	</div>
</div>
	
    <div class="spacer"></div>
	<div id="how-it-works" class="container greyback">
      	<div class="row col-md-12 text-center">
        	<h2>The Three-Step Process</h2>
      	</div>
    	<div class="col-md-4">
    		<h3 class="text-center">Free Box Drop-off</h3>
    		<p>Request <b>heavy-duty</b>, <b>waterproof</b>, plastic boxes to your doorstep and get them by the very next day.</p>
        <p>&nbsp;</p>
        <img class="img-responsive center-block" src="img/door.png" style="max-width: 70%" />
        <div class="spacer"></div>
    	</div>
    	<div class="col-md-4">
    		<h3 class="text-center">Hassle-Free Pickup</h3>
    		<p>Load your boxes with any personal belongings that you need securely stored and schedule a time for us to pick them up.</p>
    	  <p>&nbsp;</p>
        <img class="img-responsive center-block" src="img/truck.png" style="max-width: 70%" />
        <div class="spacer"></div>
      </div>
    	<div class="col-md-4">
    		<h3 class="text-center">Instant Retrieval</h3>
    		<p>Whenever you need your belongings back, send in a request and we'll have them to you the same day.</p>
        <p>&nbsp;</p>
        <img class="img-responsive center-block" src="img/site.png" style="max-width: 70%" />
        <div class="spacer"></div>
    	</div>
    </div>

<div class="container greyback">
      <div class="col-md-4 col-md-offset-4">
        <!-- signup --><a href="signup"><div class="btn btn-primary center-block" type="button" ><!-- data-toggle="modal" data-target="#notready" -->Start Storing More Simply</div></a>
      </div>
    </div>
    <div class="container spacer greyback"></div>

    <div class="spacer"></div>
    <div id="pricing" class="container">
    	<div class="col-md-offset-2 col-md-8 text-center">
        	<h2>Simple, Affordable Pricing</h2>
        	<h3>$10 per month per box</h3>
          <p>$10 per month per medium item (guitars, pillow and comforter sets, longboards)</p>
          <p>$20 per month per large item (bookcases, large bicycles)</p>
          <p>$30 per month per extra-large item (your king-size mattress)</p>
      	</div>
    </div>
    <div class="spacer"></div>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <iframe style="width: 100%; height: 315px" src="https://www.youtube.com/embed/39pjrFl51TY" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="spacer"></div>
    <div id="why" class="container greyback">
    	<div class="row col-md-12 text-center">
        	<h2>What can you use the space for?</h2>
      	</div>
      	<div class="col-md-3">
    		<h3 class="text-center">Extra Closet Space</h3>
    		<p>Closets brimming with stuff? Outsource some of those clothes and books so you don't have to deal with them.</p>
    	</div>
    	<div class="col-md-3">
    		<h3 class="text-center">Seasonal Storage</h3>
    		<p>Do you really need a winter coat in the summer? How about your ice cream machine when it's below freezing? You don't want to buy new things every half year. Securely store them instead.</p>
    	</div>
    	<div class="col-md-3">
    		<h3 class="text-center">Temporary Storage During a Sublet</h3>
    		<p>Keep your stuff safe while someone else lives at your place. They'll also be thankful they aren't wading through clutter.</p>
    	</div>
    	<div class="col-md-3">
    		<h3 class="text-center">International Storage</h3>
    		<p>Store all the things you have that can't be bought in the states, and avoid dragging things back and forth across borders.</p>
    	</div>
    </div>
    <div class="container spacer greyback"></div>
    <div class="container greyback">
	    <div class="col-md-4 col-md-offset-4">
        <!-- signup --><a href="signup"><div class="btn btn-primary center-block" type="button">Start Storing More Simply</div></a>
      </div>
    </div>
    <div class="container spacer greyback"></div>
    <div class="col-md-4 col-md-4 col-md-4 news">
        <div class="text-center">
          <a href="http://www.michigandaily.com/news/local-start-offers-new-storage-options"><img class="img-responsive icon center-block" style="padding: 10%" src="img/md.jpg"></img></a>
        </div>
    </div>
    <div class="col-md-4 col-md-4 col-md-4 news">
        <div class="text-center">
          <a href="http://www.grbj.com/articles/80660-startup-develops-college-storage-service"><img class="img-responsive icon center-block" style="padding: 10%" src="img/grbj.jpg"></img></a>
        </div>
    </div>
    <div class="col-md-4 col-md-4 col-md-4 news">
        <div class="text-center">
          <a href="http://startgarden.com/ideas/detail/vaultd"><img class="img-responsive icon center-block" style="padding: 10%" src="img/sg.jpg"></img></a>
        </div>
    </div>
    <div class="spacer"></div>
    <div class="container">
    	<p class="text-center">Find us on <a href="https://www.facebook.com/vaultdstorage">Facebook</a> and <a href="https://twitter.com/vaultdstorage">Twitter</p>
    </div>
  	<!-- <footer style="background: #eeeeee">
  		<div id="contact" class="container text-center">
  			<p><a href="mailto:info@vaultdstorage.com">info@vaultdstorage.com</a></p>
  		</div>
  		<!- - <div class="container text-center" style="display: hidden">
  			&copy; 2014 Vaultd Team
  		</div> - ->
  	</footer> -->


    <div class="modal fade" id="notready" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">We're Not Ready</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="presignup.php">
          <p>Our site isn't quite ready yet. However, if you give us your name and email, when you sign up with the same email we'll give you 25% off your first three months storing with us.</p>
          <br>
          <p class="text-center">name&nbsp;<input type="text" id="name" name="name" required="required"><br>email&nbsp;<input type="email" id="email" name="email"></p>
          <br>
          <p><input class="center-block btn btn-success" type="submit" name="submit" value="Submit" required="required"></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>
