<?php
    // By Mitchell Vitez, Feb 13 2015
    // Inserts new name and email address into promos table
    
    include_once("utils.php");

    $mysqli_connection = getConnection();
    $previousPage = "http://vaultdstorage.com";

    previousPageOnError($mysqli_connection->connect_error, $previousPage, "failed connection ".$mysqli_connection->connect_error);

    $name = sanitize($_POST['name'], $mysqli_connection);
    $email = sanitize($_POST['email'], $mysqli_connection);

    previousPageOnError(empty($name) or empty($email), $previousPage, "one or more form fields was left empty");

    $preamble = "INSERT INTO vitezme_vaultd.promos (`promo_id`, `email`, `name`) ";
    $values = "VALUES ('0', '".$email."', '".$name."')";
    $query = $preamble . $values;

    previousPageOnError(!mysqli_query($mysqli_connection, $query), $previousPage, "query failure");

    mysqli_close($mysqli_connection);

    session_start();
    $_SESSION['thanks'] = "ty";

    header('Location: http://www.vaultdstorage.com');

?>