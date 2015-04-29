<?php

    session_start();

    unset($_SESSION['email']);
    unset($_SESSION['logged_in']);
    unset($_SESSION['admin']);

    header('Location: https://vaultdstorage.com'); 

?>