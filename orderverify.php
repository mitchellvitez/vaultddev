<?php
    // By Mitchell Vitez, Feb 14 2015
    // Creates new order and adds to orders table

    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['logged_in'])) {
        header('Location: login');
    }
    if ($_SESSION['logged_in'] != true) {
        header('Location: login');
    }
    
    include_once("utils.php");

    $mysqli_connection = getConnection();
    $previousPage = "order";

    $order = sanitize($_POST['order'], $mysqli_connection);
    previousPageOnError($order != "true", $previousPage, "bad origin");
    previousPageOnError($mysqli_connection->connect_error, $previousPage, "failed connection ".$mysqli_connection->connect_error);

    $boxnum = sanitize($_POST['boxnum'], $mysqli_connection);
    $deliverydate = sanitize($_POST['deliverydate'], $mysqli_connection);
    $pickupdate = sanitize($_POST['pickupdate'], $mysqli_connection);

    previousPageOnError(empty($boxnum) or empty($deliverydate) or empty($pickupdate), $previousPage, "one or more form fields was left empty");
    previousPageOnError(strtotime($pickupdate) < strtotime($deliverydate), $previousPage, "pickup date cannot be before delivery date");
    previousPageOnError(strtotime($pickupdate) < strtotime($deliverydate.' + 14 days'), $previousPage, "pickup date cannot be more than two weeks after delivery date");

    $userid = userIdFromEmail($_SESSION['email'], $previousPage);

    $preamble = "INSERT INTO vitezme_vaultd.orders (`user_id`, `box_num`, `delivery_date`, `pickup_date`, `type`) ";
    $values = "VALUES ('$userid','$boxnum', '$deliverydate', '$pickupdate', 'order')";
    $query = $preamble . $values;


    $result = mysqli_query($mysqli_connection, $query);
    previousPageOnError(!$result, $previousPage, "query failure");

    mysqli_close($mysqli_connection);

    session_start();
    $_SESSION['thanks'] = "order";
    $_SESSION['boxnum'] = $boxnum;
    $_SESSION['deliverydate'] = $deliverydate;
    $_SESSION['pickupdate'] = $pickupdate;

    header('Location: order');
?>
