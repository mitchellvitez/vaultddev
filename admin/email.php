<?php 
    if (! empty($_POST['email']) and $_POST['type'] == 'dropoff') {
        error_log("mailing");
        mail("mitchellvitez@gmail.com", "Vaultd Dropoff for ".$_POST['email'], $_POST['boxids']);
        header('Location: dropoff');
    }
?>
