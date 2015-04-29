<?php
    header("Access-Control-Allow-Origin: https://www.vaultdstorage.com");
    
    session_start();

    include_once("../../utils.php");

    if(!isset($_SESSION['email']) or !isset($_SESSION['logged_in']) or !isset($_SESSION['admin'])) {
        // header('Location: ../../login');
        exit('[]');
    }
    if ($_SESSION['logged_in'] != true) {
        // header('Location: ../../login');
        exit('[]');
    }
    if ($_SESSION['admin'] != true) {
        // header('Location: ../../login');
        exit('[]');
    }

    $mysqli_connection = getConnection();
    $previousPage = "users";

    previousPageOnError($mysqli_connection->connect_error, $previousPage, "failed connection ".$mysqli_connection->connect_error);

    $query = "SELECT * FROM vitezme_vaultd.users";

    $result = false;
    previousPageOnError(!$result = mysqli_query($mysqli_connection, $query), $previousPage, "query failure");

    $data = array();
    while($row = $result->fetch_assoc()){
        unset($row['password']);
        $data[] = $row;
    }
    echo json_encode($data);
    
    mysqli_close($mysqli_connection);
?>