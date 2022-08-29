<?php
    require_once "db.php";
    $jsonData = json_decode($_POST['data']);

    $username = $jsonData->username;
    $password = $jsonData->password;
    $email = $jsonData->email;
    $address = $jsonData->address;

    $conn = getConnection();
    $sql = "insert into admin (username, password, email, address) values('{$username}', '{$password}', '{$email}', '{$address}')";

    if(mysqli_query($conn, $sql)){
        echo "success";
    }else{
        echo "Database connection Error";
    }
?>