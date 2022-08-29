<?php 
	session_start();
	if(isset($_COOKIE['status'])){
?>

<html>
<head>
	<title>Admin Home Page</title>
  <link rel="stylesheet" href="../asset/css/adminHome.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="header">
    <a href="#default" class="logo">Trip Planner</a>
    <div class="header-right">
      <a href="../controller/profile.php">
        <img src="../asset/img/img_avatar2.png" alt="Avatar" class="avatar">
      </a>
      <a href="../controller/logout.php">
        <img src="../asset/img/out.png" alt="Avatar" class="avatar">
      </a>
    </div>
  </div>
  <div class="contentbg"></div>
  <div class="content">
    <center>
      <div class="circle">
        <a href="viewAdmins.php">
          <img src="../asset/img/admin.jpg" alt="Avatar" class="bigAvatar2">
          <h3 class="circleTitle"> View Admins </h3>
        </a>
        <a href="viewManagers.php">
          <div class="circleContent">
          <img src="../asset/img/manager.jpg" alt="Avatar" class="bigAvatar">
          <h3 class="circleTitle"> View Managers </h3>
          </div>
        </a>
        <a href="viewClients.php">
          <div class="circleContent">
          <img src="../asset/img/clients.jpg" alt="Avatar" class="bigAvatar2">
          <h3 class="circleTitle"> View Clients </h3>
          </div>
        </a>
        <a href="viewTourGuides.php">
          <div class="circleContent">
          <img src="../asset/img/tourGuide.jpg" alt="Avatar" class="bigAvatar">
          <h3 class="circleTitle"> View Tour Guides </h3>
          </div>
        </a>
      </div>
    </center>
  </div>
</body>
</html>

<?php 
	}else{
		echo "invalid request";
	}  
?>
