<?php
    require_once "db.php";
    if(isset($_COOKIE['status'])) {
        $myId = $_COOKIE['myId'];

        if (isset($_POST['getCurrentPass'])) {
            $conn = getConnection();
            $sql = "select * FROM admin WHERE id = '$myId'";
            $currentPass = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($currentPass);
            if($row1){
                echo $row1['password'];
            }else{
                echo "Database connection error";
            }
        }

        if (isset($_POST['newPassword'])) {
            $newPass = $_POST['newPassword'];
            $conn = getConnection();
            $sql = "update admin SET password='$newPass' WHERE id='$myId'";
            if (mysqli_query($conn, $sql)) {
                echo "You have changed your password successfully!";
            } else {
                echo "Database connection Error! Please try again.";
            }
        }
    }else{
		echo "invalid request";
	}  

    
?>