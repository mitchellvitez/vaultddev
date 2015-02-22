<?php
    // By Mitchell Vitez, Feb 14 2015
    // Creates new user and adds to users table
    
    include_once("utils.php");

    $mysqli_connection = getConnection();
    $previousPage = "signup";

    $signup = sanitize($_POST['signup'], $mysqli_connection);
    previousPageOnError($signup != "true", $previousPage, "bad origin");
    previousPageOnError($mysqli_connection->connect_error, $previousPage, "failed connection ".$mysqli_connection->connect_error);
    
    $unhashedPassword = sanitize($_POST['password'], $mysqli_connection);
    $passwordCheck = sanitize($_POST['password2'], $mysqli_connection);
    previousPageOnError($unhashedPassword != $passwordCheck, $previousPage, "passwords do not match");
    unset($passwordCheck);
    previousPageOnError(empty($unhashedPassword), $previousPage, "one or more form fields was left empty");
    $password = hashPassword($unhashedPassword);
    unset($unhashedPassword);

    $name = sanitize($_POST['name'], $mysqli_connection);
    $email = sanitize($_POST['email'], $mysqli_connection);
    $phone = sanitize($_POST['phone'], $mysqli_connection);
    $address1 = sanitize($_POST['address1'], $mysqli_connection);
    $address2 = sanitize($_POST['address2'], $mysqli_connection);
    $city = sanitize($_POST['city'], $mysqli_connection);
    $zip = sanitize($_POST['zip'], $mysqli_connection);
    $state = sanitize($_POST['state'], $mysqli_connection);
    $country = sanitize($_POST['country'], $mysqli_connection);
    $update = (isset($_POST['update'])) ? 1 : 0;
    $terms = (isset($_POST['terms'])) ? true : false;

    previousPageOnError(empty($name) or empty($email) or empty($phone) or empty($address1)
            or empty($city) or empty($zip) or empty($state) or empty($country), $previousPage, "one or more form fields was left empty");

    previousPageOnError(!$terms, $previousPage, "terms of service not agreed to");

    $preamble = "INSERT INTO vitezme_vaultd.users (`name`, `email`, `password`, `phone`, `address_line_1`, `address_line_2`, `city`, `zip`, `state`, `country`, `role`, `email_update`) ";
    $values = "VALUES ('$name','$email', '$password', '$phone', '$address1', '$address2', '$city', '$zip', '$state', '$country', 'user', '$update')";
    $query = $preamble . $values;

    $result = false;
    previousPageOnError(!$result = mysqli_query($mysqli_connection, $query), $previousPage, "query failure");

    mysqli_close($mysqli_connection);

    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['logged_in'] = true;

    header('Location: profile');
?>
