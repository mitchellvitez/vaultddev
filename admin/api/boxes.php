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
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
        exit("[]");
    }

    $mysqli_connection = getConnection();
    $previousPage = "boxes";

    previousPageOnError($mysqli_connection->connect_error, $previousPage, "failed connection ".$mysqli_connection->connect_error);

    $query = "SELECT * FROM vitezme_vaultd.boxes";

    $result = false;
    previousPageOnError(!$result = mysqli_query($mysqli_connection, $query), $previousPage, "query failure");

    $data = array();
    while($row = $result->fetch_assoc()) {
        /* error_log('id : '.$row['user_id']);
        $email = userEmailFromId($row['user_id'], "error.txt");

        $row['email'] = $email;
        error_log('email : '.$row['email']); */
        $data[] = $row;
    }
    echo json_encode($data);
    
    mysqli_close($mysqli_connection);
?>