<?php 
	session_start();
	if(isset($_COOKIE['status'])){
?>

<html>
<head>
	<title>User Home Page</title>
</head>
<body>
    <center>
        <p><b><h1>Welcome Anne!</h1></b></p>
        <a href="Profile.html"> Profile </a><br>
        <a href="ChangePass.html"> Change Password </a><br>
        <a href="Logout.php"> Logout </a><br>
    </center>
</body>
</html>


<?php 
	}else{
		echo "invalid request";
	}  
?>