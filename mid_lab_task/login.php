<?php 
	session_start();

	//print_r($_GET);  
	$id = $_POST['id'];
	$password = $_POST['password'];
	//echo $username;

	if($id == "1" && $password == "123")
	{
		$_SESSION['status'] = true;
		setcookie('status', 'true', time()+3600, '/');
		header('location: Adminhome.php');
	}

	if($id == null || $password == null){
		echo "null id/password";
	}
	else{
		$file = fopen('user.txt', 'r');
		
		while (!feof($file)) {
			$data=fgets($file);
			$user = explode('|', $data);
			if($id == trim($user[0]) && $password == trim($user[1])){
				$_SESSION['status'] = true;
				setcookie('status', 'true', time()+3600, '/');
				header('location: Userhome.php');
			}
		}
		echo "invalid user";
	}