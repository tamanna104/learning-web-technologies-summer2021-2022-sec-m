<?php
	$listUpdated = false;
	if (isset($_POST['deleteAdmin'])) {
		deleteAdmin();
		$GLOBALS['listUpdated'] = true;
	}
	function deleteAdmin() {
		$updatedData = "";
		$selectedId = $_POST['deleteAdmin'];
		$file = fopen('managerList.txt', 'r');
		while (!feof($file)) {
			$data=fgets($file);
			$managers = explode('|', $data);
			if(isset($managers) && sizeof($managers) > 1 && $managers[0] != $selectedId)
			{
				$updatedData = $managers[0]."|".$managers[1]."|".$managers[2]."|".$managers[3]."|".$managers[4]."|".$managers[5]."|".$managers[6]."|".$managers[7]."|".$managers[8]."|".$managers[9];
				$newFile = fopen('temp.txt', 'a');
				fwrite($newFile, $updatedData);
				fclose($newFile);
			}
		}
	}
	if(isset($_COOKIE['status'])){		
?>
<html>
<head>
	<title>Manager Info</title>
</head>
<header class="header">
	<a class="headLink" href="adminHome.php">Home</a>
	<h2>Manager Info</h2>
	<a class="headLink" href="managerRequests.php">Manager Requests</a>
</header>
<body>
	<?php 
		if (file_exists('./managerList.txt')) {
	?>
		<form action="viewManagers.php" method="post">
			<br><br>
			<table border="3" align="left">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Password</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Date Of Birth</th>
					<th>Gender</th>
					<th>Address</th>
					<th>Bio</th>
					<th>Website</th>
					<th>Actions</th>
					</th>
				</tr>
				<?php
					
					$file = fopen('managerList.txt', 'r');
					while (!feof($file)) 
					{
						$data=fgets($file);
						$managers = explode('|', $data);
						
						if(isset($managers) && sizeof($managers) > 1)
						{
							$id = trim($managers[0]);
							$name = trim($managers[1]);
							$password = trim($managers[2]);
							$email = trim($managers[3]);
							$contact = trim($managers[4]);
							$dob = trim($managers[5]);
							$gender = trim($managers[6]);
							$address = trim($managers[7]);
							$bio = trim($managers[8]);
							$website = trim($managers[9]);
							echo "<tr>";
							echo "<td>".$id."</td>";
							echo "<td>".$name."</td>";
							echo "<td><input type = 'password' disabled value = '".$password."'/></td>";
							echo "<td>".$email."</td>";
							echo "<td>".$contact."</td>";
							echo "<td>".$dob."</td>";
							echo "<td>".$gender."</td>";
							echo "<td>".$address."</td>";
							echo "<td>".$bio."</td>";
							echo "<td>".$website."</td>";
							echo "<td>
							<button type='submit' name='deleteAdmin' value='$id'>Delete</button><br><br>
							<button type='button'> <a href='managerEdit.php?id=$id'>Edit</a></button>
							</td>";
							echo "</tr>";
						}

					}
					fclose($file);
					if ($GLOBALS['listUpdated']) {
						unlink('managerList.txt');
						rename('temp.txt', 'managerList.txt');
						header('location: viewManagers.php');
					}
				?>

			</table>
		</form>
		<?php 
		} else {
			echo "There is no Manager";	
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
      margin-bottom: 10px;
      padding: 3px;
      justify-content: center;
    }
	th {
		padding: 2px 10px;
		text-align: center;
	}
	td {
		padding: 2px 10px;
		text-align: center;
	}
</style>
<?php 
	}else{
		echo "invalid request";
	}  
?>

