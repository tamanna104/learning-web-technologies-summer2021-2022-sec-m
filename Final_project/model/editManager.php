<?php
    require_once "db.php";
    if(isset($_COOKIE['status'])) {
        $jsonData = json_decode($_POST['data']);

        $userId = $jsonData->userId;
        $username = $jsonData->username;
        $password = $jsonData->password;
        $email = $jsonData->email;
        $contact = $jsonData->contact;
        $dob = $jsonData->dob;
        $gender = $jsonData->gender;
        $address = $jsonData->address;
        $bio = $jsonData->bio;
        $website = $jsonData->website;

        $conn = getConnection();
        $sql = "update managers set name='$username', password='$password', email='$email', contact='$contact',
            dob='$dob', gender='$gender', address='$address', bio='$bio', website='$website'
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