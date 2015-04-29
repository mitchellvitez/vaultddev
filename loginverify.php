<?php
    // By Mitchell Vitez, Feb 15 2015
    // Checks password against username

    include_once("utils.php");

    $mysqli_connection = getConnection();
    $previousPage = "login";

    previousPageOnError($_POST['login'] != "true", $previousPage, "bad origin");
    previousPageOnError($mysqli_connection->connect_error, $previousPage, "failed connection ".$mysqli_connection->connect_error);

    $email = sanitize($_POST['email'], $mysqli_connection);
    previousPageOnError(empty($email), $previousPage, "one or more form fields was left empty");
    $unhashedPassword = sanitize($_POST['password'], $mysqli_connection);
    previousPageOnError(empty($unhashedPassword), $previousPage, "one or more form fields was left empty");
    $password = hashPassword($unhashedPassword);
    unset($unhashedPassword);

    $query = "SELECT * FROM vitezme_vaultd.users WHERE `email` = '$email' LIMIT 1";

    $result = false;
    previousPageOnError(!$result = mysqli_query($mysqli_connection, $query), $previousPage, "query failure");
    previousPageOnError($result->num_rows == 0, $previousPage, "email not found in database");
    previousPageOnError($result->fetch_assoc()['password'] != $password, $previousPage, "either email or password was incorrect");

    session_start();

    $result = false;
    previousPageOnError(!$result = mysqli_query($mysqli_connection, $query), $previousPage, "query failure");
    if ($result->fetch_assoc()['role'] == 'admin') {
        $_SESSION['admin'] = true;
        error_log("admin: ".$email." logged in");
    }

    mysqli_close($mysqli_connection);
    
    $_SESSION['email'] = $email;
    $_SESSION['logged_in'] = true;

    header('Location: boxes'); 
?>
