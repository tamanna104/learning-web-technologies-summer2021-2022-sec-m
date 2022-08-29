<?php
    require_once "db.php";
    $jsonData = json_decode($_POST['data']);

    $username = $jsonData->username;
    $password = $jsonData->password;

    $conn = getConnection();
    $sql = "select * from admin where username='{$username}' and password='{$password}'";

    $result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
    if($count > 0){
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];

        session_start();
        $_SESSION['status'] = true;
        setcookie('status', 'true', time()+6000000, '/');
        setcookie('myId', $id, time()+6000000, '/');
        setcookie('myPassword', $password, time()+6000000, '/');
        echo "success";
    }else{
        echo "no user";
    }
?>