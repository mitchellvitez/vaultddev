<?php
    header("Access-Control-Allow-Origin: https://www.vaultdstorage.com");

    session_start();

    include_once("../../utils.php");

    if(!isset($_SESSION['email']) or !isset($_SESSION['logged_in']) or !isset($_SESSION['admin'])) {
        // header('Location: ../../login');
        exit('{"error":"not set"}');
    }
    if ($_SESSION['logged_in'] != true) {
        // header('Location: ../../login');
        exit('{"error":"not logged in"}');
    }
    if ($_SESSION['admin'] != true) {
        // header('Location: ../../login');
        exit('{"error":"not admin"}');
    }
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
        // exit('{"error":"error"}');
    }

    $mysqli_connection = getConnection();
    $previousPage = "error.txt";

    previousPageOnError($mysqli_connection->connect_error, $previousPage, "failed connection ".$mysqli_connection->connect_error);

    $query = "SELECT * FROM vitezme_vaultd.orders, vitezme_vaultd.users WHERE vitezme_vaultd.orders.user_id = vitezme_vaultd.users.id";

    $result = false;
    previousPageOnError(!$result = mysqli_query($mysqli_connection, $query), $previousPage, "query failure");

    $data = array();
    while($row = $result->fetch_assoc()) {
        // error_log('id : '.$row['user_id']);
        //$email = userEmailFromId($row['user_id'], $previousPage);
    	unset($row['password']);
        //$row['email'] = $email;
        // error_log('email : '.$row['email']);
        $data[] = $row;
    }
    echo json_encode($data);
    
    mysqli_close($mysqli_connection);
?>