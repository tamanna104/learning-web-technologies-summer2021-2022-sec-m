<?php
		if(isset($_COOKIE['status'])){
        
			
?>
<html>
<head>
    <title>My Profile</title>
</head>
<header class="header">
	<a href="adminHome.php">Back</a>
	<h2>My Profile</h2>
	<a href="changePass.php">Change Password</a>
</header>
<body>
		<form>
			<br/>
			<br/>
			<table border="3" align="center">
				<tr>
					<th>id</th>
					<th>name</th>
					<th>password</th>
					<th>email</th>
					<th>address</th>
				</tr>
				<?php
					
					$file = fopen('admin.txt', 'r');
					while (!feof($file)) {
							$data=fgets($file);
							$user = explode('|', $data);
							
							if(isset($user) && sizeof($user) > 1)
							{
								if($user[0]== $_COOKIE['myId'])
								{
									$id = trim($user[0]);
									$username = trim($user[1]);
									$password = trim($user[2]);
									$email = trim($user[4]);
									$address = trim($user[5]);
									echo "<tr>";
									echo "<td>".$id."</td>";
									echo "<td>".$username."</td>";

									echo "<td><input type = 'password' disabled value = '".$password."'/></td>";
									echo "<td>".$email."</td>";
									echo "<td>".$address."</td>";
									echo "</tr>";
									break;
								}
								
							}

						}
				?>

			</table>
		</form>
</body>
</html>
<style> 
    body {
	  background-image: linear-gradient(rgb(251, 251, 251), rgb(129, 120, 252));
    }

	.header {
		padding: 0px 20px;
		background: rgb(129, 120, 252);
		color: white;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	a {
		color: #FFF;
		font-size: 20px;
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
	th {
		padding: 5px 15px;
		text-align: center;
	}
	td {
		padding: 5px 15px;
		text-align: center;
	}
</style>
<?php 
	}else{
		echo "invalid request";
	}  
?>
