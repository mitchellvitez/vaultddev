<?php
    session_start();

    include_once("../../utils.php");

    if(!isset($_SESSION['email']) or !isset($_SESSION['logged_in']) or !isset($_SESSION['admin'])) {
        header('Location: ../../login');
    }
    if ($_SESSION['logged_in'] != true) {
        header('Location: ../../login');
    }
    if ($_SESSION['admin'] != true) {
        header('Location: ../../login');
    }

?>