<?php 
	session_start();

	$id = $_POST['id'];
	$password = $_POST['password'];
	$confirmpass = $_POST['confirmpass'];
	$name = $_POST['name'];
	$usertype = $_POST['usertype'];

	if($id == null || $password == null || $name == null){
		echo "null id/password/email";
	}
	
	else{

		$user = $id."|".$password."|".$confirmpass."|".$name."|".$usertype."\r\n";
		$file = fopen('user.txt', 'a');
		fwrite($file, $user);
		header('location: login.html');
	}
