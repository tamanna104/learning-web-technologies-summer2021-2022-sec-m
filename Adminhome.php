<?php 
	session_start();
	if(isset($_COOKIE['status'])){
?>

<html>
<head>
	<title>Admin Home Page</title>
</head>
<body>
<fieldset>
	<center>
		<p><b><h1>Welcome Bob!</h1></b></p>
		<a href="Profile.html"> Profile </a><br>
		<a href="ChangePass.html"> Change Password </a><br>
		<a href="ViewUsers.html"> View Users </a><br>
		<a href="Logout.php"> logout </a>
	</center>
</body>
</html>


<?php 
	}else{
		echo "invalid request";
	}  
?>