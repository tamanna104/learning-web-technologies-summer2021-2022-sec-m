<?php 
	session_start();

	//print_r($_GET);  
	$id = $_POST['id'];
	$password = $_POST['password'];
	//echo $username;


	if($id == null || $password == null){
		echo "null id/password";
	}
	else{
		$file = fopen('admin.txt', 'r');
		
		while (!feof($file)) {
			$data=fgets($file);
			$user = explode('|', $data);
			if($id == trim($user[0]) && $password == trim($user[2])){
				$_SESSION['status'] = true;
				setcookie('status', 'true', time()+6000000, '/');
				setcookie('myId', $id, time()+6000000, '/');
				setcookie('myPassword', $password, time()+6000000, '/');
				header('location: adminHome.php');
			}
		}
		echo "invalid user";
	}
?>