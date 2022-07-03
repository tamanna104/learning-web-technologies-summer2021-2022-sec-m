<?php 
	session_start();
	//if(isset($id) || isset($username) || isset($password) || isset($confirmpass) || isset($email) || isset($address)){
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirmpass = $_POST['confirmpass'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		echo $id;

		if($id != null && $username != null && $password != null && $confirmpass != null && $email != null && $address != null)
		{
			$user = $id."|".$username."|".$password."|".$confirmpass."|".$email."|".$address."\r\n";
			$file = fopen('admin.txt', 'a');
			fwrite($file, $user);
			header('location: login.html');
		}
	
	}
	else{
		echo "Null insertion. Please fillup all the fields";
	}
		
?>