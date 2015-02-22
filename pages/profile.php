<?php session_start(); ?>
<div class="container">
    <div class="col-md-offset-4 col-md-4">
        <h2 class="text-center">Profile</h2>
        <p></p>
        <h3>Hi there!</h3>
        <p>Here you can manage your Vaultd account.</p>
        <p>Your email is <a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></p>
    </div>
</div>
