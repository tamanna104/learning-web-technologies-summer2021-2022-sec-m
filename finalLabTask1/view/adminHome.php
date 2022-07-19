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
	<center class="content">
		<p><b><h1>Trip Planner</h1></b></p>
		<a href="../controller/profile.php"> Profile </a><br>
		<a href="viewAdmins.php"> View Admins </a><br>
		<a href="viewManagers.php"> View Managers </a><br>
		<a href="viewClients.php"> View Clients </a><br>
		<a href="viewTourGuides.php"> View Tour Guides </a><br>
		<a href="../controller/logout.php"> logout </a>
	</center>
</body>
</html>
<style> 
    body {
	  background-image: linear-gradient(rgb(251, 251, 251), rgb(129, 120, 252));
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .content {
      padding: 25px 60px;
      background-color: #FFF;
    }
    input {
      margin-bottom: 15px;
      padding: 6px;
      justify-content: center;
    }
    .register {
      text-align: center;
    }
</style>

<?php 
	}else{
		echo "invalid request";
	}  
?>
