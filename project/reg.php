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

		if($username == null || $email == null || $password == null)
		{
			echo "Please fill up the fields!";
		}
		else if($username == null || is_numeric($username[0]) || str_contains($username[0],' ') || str_contains($username,'%') || str_contains($username,'$') || str_contains($username,'*') )
		{
			echo "Invalid name. ";
		}
		else if(strlen($password) < 6 || strlen($password) > 16)
		{
			echo "Password must be between 6 and 16 characters in length. ";
		}
		else if (strpos($password, '$')=== false && strpos($password, '(')=== false && strpos($password, '&')=== false && strpos($password, '}')=== false && strpos($password, '{')=== false && strpos($password, '%')=== false && strpos($password, '!')=== false && strpos($password, '#')=== false && strpos($password, '@')=== false && strpos($password,'+')=== false && strpos($password,'_')=== false && strpos($password,'.')=== false)
		{
			echo "Password is weak. Must contain a special character. ";
		}
		else if($password != $confirmpass)
		{
			echo "Password and confirm password doesn't match. ";
		}
		else
		{
			$user = $id."|".$username."|".$password."|".$confirmpass."|".$email."|".$address."\r\n";
			$file = fopen('admin.txt', 'a');
			fwrite($file, $user);
			header('location: login.html');
		}
	
	}
	
		
?>