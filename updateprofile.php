<?php
    include_once("utils.php");

    session_start();

    $mysqli_connection = getConnection();
    $previousPage = "profile";

    $updatingProfile = sanitize($_POST['updateprofile'], $mysqli_connection);
    previousPageOnError($updatingProfile != "true", $previousPage, "bad origin");
    previousPageOnError($mysqli_connection->connect_error, $previousPage, "failed connection ".$mysqli_connection->connect_error);

    $type = sanitize($_POST['type'], $mysqli_connection);

    $query = "";
    $id = userIdFromEmail($_SESSION['email']);

    if ($type = "address") {
        $address1 = sanitize($_POST['address1'], $mysqli_connection);
        $address2 = sanitize($_POST['address2'], $mysqli_connection);
        $city = sanitize($_POST['city'], $mysqli_connection);
        $zip = sanitize($_POST['zip'], $mysqli_connection);
        $state = sanitize($_POST['state'], $mysqli_connection);
        $country = sanitize($_POST['country'], $mysqli_connection);

        previousPageOnError(empty($address1), $previousPage, "address line one cannot be blank");

        $query = "UPDATE `users` SET
            address_line_1 = '$address1',
            address_line_2 = '$address2',
            city = '$city',
            zip = '$zip',
            state = '$state',
            country = '$country'
            WHERE id = '$id'";
    }
    if ($type = "phone") {
        $phone = sanitize($_POST['phone'], $mysqli_connection);

        previousPageOnError(empty($phone), $previousPage, "phone number cannot be blank");
        
        $query = "UPDATE `users` SET
            phone = '$phone',
            WHERE id = '$id'";
    }


    $result = false;
    previousPageOnError(!$result = mysqli_query($mysqli_connection, $query), $previousPage, "query failure");

    error_log($mysqli_connection->error);

    mysqli_close($mysqli_connection);

    header('Location: profile');

?>
