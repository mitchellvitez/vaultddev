<?php
    header('Access-Control-Allow-Origin: https://vaultdstorage.com');
    include_once("../utils.php");
    
    function cleanUserId($email) {
        $conn = getConnection();

        $query = "SELECT `id` FROM vitezme_vaultd.users WHERE `email` = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if (!$result or $result->num_rows == 0) {
            exit("user not found in database");
        }
        return $result->fetch_assoc()['id'];

        mysqli_close($conn);
    }

    echo cleanUserId($_GET['email']);
?>