<?php
	$listUpdated2 = false;
	if (isset($_POST['deleteAdmin'])) {
		deleteAdmin();
		$GLOBALS['listUpdated2'] = true;
	}
	function deleteAdmin() {
		$updatedData = "";
		$selectedId = $_POST['deleteAdmin'];
		$file = fopen('../model/clientList2.txt', 'r');
		while (!feof($file)) {
			$data=fgets($file);
			$clients = explode('|', $data);
			echo $clients[0]."txt".$selectedId;
			if(isset($clients) && sizeof($clients) > 1 && $clients[0] != $selectedId)
			{
				$updatedData = $clients[0]."|".$clients[1]."|".$clients[2]."|".$clients[3]."|".$clients[4]."|".$clients[5];
				$newFile = fopen('../model/temp.txt', 'a');
				fwrite($newFile, $updatedData);
				fclose($newFile);
			}
		}
	}
	if(isset($_COOKIE['status'])){		
?>
<html>
<head>
	<title>Clients Info</title>
</head>
<header class="header">
	<a class="headLink" href="adminHome.php">Back</a>
	<h2>Clients Info</h2>
	<a class="headLink" href="adminHome.php">Home</a>
</header>
<body>
	<?php 
		if (file_exists('../model/clientList2.txt')) {
	?>
		
	<form action="viewClients.php" method="post">
		<br><br>
		<table border="3" align="center">
			<tr>
				<th>Name</th>
				<th>Password</th>
				<th>Email</th>
				<th>Date Of Birth</th>
				<th>Country</th>
				<th>Action</th>
			</tr>
			<?php
				
				$file = fopen('../model/clientList2.txt', 'r');
				while (!feof($file)) {
						$data=fgets($file);
						$clients = explode('|', $data);
						
						if(isset($clients) && sizeof($clients) > 1)
						{
							$clientId = trim($clients[0]);
							$username = trim($clients[1]);
							$password = trim($clients[2]);
							$email = trim($clients[3]);
							$dob = trim($clients[4]);
							$country = trim($clients[5]);
							echo "<tr>";
							echo "<td>".$username."</td>";
							echo "<td><input type = 'password' disabled value = '".$password."'/></td>";
							echo "<td>".$email."</td>";
							echo "<td>".$dob."</td>";
							echo "<td>".$country."</td>";
							echo "<td>
							<button type='submit' name='deleteAdmin' value='$clientId'>Remove</button>
							</td>";
							echo "</tr>";
						}

					}
					fclose($file);
					if ($GLOBALS['listUpdated2']) {
					unlink('../model/clientList2.txt');
					rename('../model/temp.txt', '../model/clientList2.txt');
					header('location: viewClients.php');
					}
		?>
		</table>
	</form>
	<?php 
		} else {
			'<a href="adminHome.php">Home</a>';
			echo "There is no Client";	
			
		}
	?>
	<br/>

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
	.headLink {
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