<?php
    
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");

    session_start();

    include_once("../utils.php");

    if(!isset($_SESSION['email']) or !isset($_SESSION['logged_in'])) {
        header('Location: login');
    }
    if ($_SESSION['logged_in'] != true) {
        header('Location: login');
    }

    $mysqli_connection = getConnection();
    $previousPage = "../boxes";

    previousPageOnError($mysqli_connection->connect_error, $previousPage, "failed connection ".$mysqli_connection->connect_error);

    $userid = userIdFromEmail($_SESSION['email'], $previousPage);

    $query = "SELECT * FROM vitezme_vaultd.boxes WHERE user_id = $userid";

    $result = false;
    previousPageOnError(!$result = mysqli_query($mysqli_connection, $query), $previousPage, "query failure");

    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    echo json_encode($data);
    
    mysqli_close($mysqli_connection);
?>