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
    $itemnum = sanitize($_POST['itemnum'], $mysqli_connection);
    $deliverydate = sanitize($_POST['deliverydate'], $mysqli_connection);
    $pickupdate = sanitize($_POST['pickupdate'], $mysqli_connection);
    $returndate = sanitize($_POST['returndate'], $mysqli_connection);
    $time = sanitize($_POST['time'], $mysqli_connection);

    previousPageOnError(empty($deliverydate) or empty($pickupdate), $previousPage, "one or more form fields was left empty");
    previousPageOnError(strtotime($pickupdate) < strtotime($deliverydate), $previousPage, "pickup date cannot be before delivery date");
    // TODO: better date checking for two week limit
    // previousPageOnError(strtotime($pickupdate) < strtotime($deliverydate.' + 14 days'), $previousPage, "pickup date cannot be more than two weeks after delivery date");

    $userid = userIdFromEmail($_SESSION['email'], $previousPage);

    $preamble = "INSERT INTO vitezme_vaultd.orders (`user_id`, `box_num`, `delivery_date`, `pickup_date`, `type`, `item_num`, `time`, `return_date`) ";
    $values = "VALUES ('$userid','$boxnum', '$deliverydate', '$pickupdate', 'order', '$itemnum', '$time', '$returndate')";
    $query = $preamble . $values;

    $result = mysqli_query($mysqli_connection, $query);
    previousPageOnError(!$result, $previousPage, "query failure");

    $query = "SELECT * FROM vitezme_vaultd.users WHERE id = $userid";
    $result = mysqli_query($mysqli_connection, $query);
    previousPageOnError(!$result, $previousPage, "query failure");
    $row = $result->fetch_assoc();
    $phone = $row['phone'];
    $name = $row['name'];
    $address_line_1 = $row['address_line_1'];
    $address_line_2 = $row['address_line_2'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];

    $orderstring = "$name ordered $boxnum boxes and $itemnum items for delivery on $deliverydate and pickup on $pickupdate. Prefers $time.\nExpected return date of $returndate."
        ."\n\n$phone\n\n$address_line_1\n$address_line_2\n$city, $state $zip";

    mail("info@vaultdstorage.com", "New order from: ".userEmailFromId($userid), $orderstring);
    mail("mitchellvitez@gmail.com", "New order from: ".userEmailFromId($userid), $orderstring);

    mysqli_close($mysqli_connection);

    session_start();
    $_SESSION['thanks'] = "order";
    $_SESSION['boxnum'] = $boxnum;
    $_SESSION['itemnum'] = $itemnum;
    $_SESSION['deliverydate'] = $deliverydate;
    $_SESSION['pickupdate'] = $pickupdate;

    header('Location: boxes');
?>
