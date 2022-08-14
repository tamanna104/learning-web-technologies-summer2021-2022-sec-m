<?php 
	session_start();
	require_once "../model/adminModel.php";

	//print_r($_GET);  
	$id = $_POST['id'];
	$password = $_POST['password'];
	//echo $username;


	if($id == null || $password == null){
		echo "null id/password";
	}
	else{
		$status = login($id, $password);
		
		if($status){
			$_SESSION['status'] = true;
			setcookie('status', 'true', time()+6000000, '/');
			setcookie('myId', $id, time()+6000000, '/');
			setcookie('myPassword', $password, time()+6000000, '/');
			header('location: ../view/adminHome.php');
		}
		echo "invalid user <br><br>";
		echo'<a href="reg.html"> Back </a>';
	}
?>