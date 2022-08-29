<?php 
	session_start();
	require_once "../model/adminModel.php";

	$username = $_POST['username'];
	$password = $_POST['password'];


	if($username == null || $password == null){
		echo "null username/password";
	}
	else{
		$status = login($username, $password);
		if($status){
			$_SESSION['status'] = true;
			setcookie('status', 'true', time()+6000000, '/');
			setcookie('myPassword', $password, time()+6000000, '/');
			header('location: ../view/adminHome.php');
		}
		echo "invalid user <br><br>";
		echo'<a href="../view/reg.html"> Back </a>';
	}
?>