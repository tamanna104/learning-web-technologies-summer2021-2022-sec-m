<?php
	$listUpdated = false;
	if (isset($_POST['deleteAdmin'])) {
		deleteAdmin();
		$GLOBALS['listUpdated'] = true;
	}
	function deleteAdmin() {
		$updatedData = "";
		$selectedId = $_POST['deleteAdmin'];
		$file = fopen('adminList.txt', 'r');
		while (!feof($file)) {
			$data=fgets($file);
			$user = explode('|', $data);
			if(isset($user) && sizeof($user) > 1 && $user[0] != $selectedId)
			{
				$updatedData = $user[0]."|".$user[1]."|".$user[2]."|".$user[3]."|".$user[4]."|".$user[5];
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
    <title>AdminList Info</title>
</head>
<header class="header">
	<a class="headLink" href="adminHome.php">Home</a>
	<h2>AdminList Info</h2>
	<a class="headLink" href="addAdmin.php">Add New</a>
</header>
<body>
	<?php 
		if (file_exists('./adminList.txt')) {
	?>
	<form action="viewAdmins.php" method="post">
		<br>
		<br>
			<table border="3" align="center">
				<tr>
					<th>id</th>
					<th>name</th>
					<th>password</th>
					<th>email</th>
					<th>address</th>
					<th>actions</th>

				</tr>
				<?php
					$file = fopen('adminList.txt', 'r');
					while (!feof($file)) {
						$data=fgets($file);
						$user = explode('|', $data);
						if(isset($user) && sizeof($user) > 1)
						{
							$id = trim($user[0]);
							$username = trim($user[1]);
							$password = trim($user[2]);
							$email = trim($user[4]);
							$address = trim($user[5]);
							echo "<tr>";
							echo "<td>".$id."</td>";
							echo "<td>".$username."</td>";
							echo "<td>".$password."</td>";
							echo "<td>".$email."</td>";
							echo "<td>".$address."</td>";
							echo "<td>
							<button type='submit' name='deleteAdmin' value='$id'>Delete</button>
							<button type='button'> <a href='adminEdit.php?id=$id'>Edit</a></button>
							</td>";
							echo "</tr>";
						}
					}
					fclose($file);
					if ($GLOBALS['listUpdated']) {
						unlink('adminList.txt');
						rename('temp.txt', 'adminList.txt');
						header('location: viewAdmins.php');
					}
				?>
			</table>
			
	</form>
	<?php 
		} else {
			echo "There is no admin";	
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
		}
			

?>