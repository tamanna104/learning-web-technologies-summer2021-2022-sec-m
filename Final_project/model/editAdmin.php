<?php
    require_once "db.php";
    if(isset($_COOKIE['status'])) {
        $jsonData = json_decode($_POST['data']);

        $userId = $jsonData->userId;
        $username = $jsonData->username;
        $password = $jsonData->password;
        $email = $jsonData->email;
        $address = $jsonData->address;

        $conn = getConnection();
        $sql = "update admin set username='$username', password='$password', email='$email', address='$address' 
            where id='$userId'";

        if(mysqli_query($conn, $sql)){
            echo "success";
        }else{
            echo "Database connection Error";
        }
    }else{
		echo "invalid request";
	}  
?>