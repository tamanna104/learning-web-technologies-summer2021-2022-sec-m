<?php
		if(isset($_COOKIE['status'])){	
?>
<html>
	<head>
		<title>My Profile</title>
	</head>
	<header class="header">
		<a href="../view/adminHome.php">Back</a>
		<h2>My Profile</h2>
		<a href="../view/changePassword.html">Change Password</a>
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
					require_once "../model/adminModel.php";
					$id = $_COOKIE['myId'];
					$profile = showProfile($id);
					if(mysqli_num_rows($profile))
                    {
                        while ($row1 = mysqli_fetch_assoc($profile))
                        {
                            ?>
                            <tbody>
                            <tr>
								<td><?php echo $row1['id']; ?></td>
                                <td><?php echo $row1['username']; ?></td>
                                <td> <input type = 'password' disabled value = '<?php echo $row1["password"]; ?>'/></td>
                                <td><?php echo $row1['email']; ?></td>
                                <td><?php echo $row1['address']; ?></td>
                            </tr>
                            </tbody>
                            <?php
                        }
                    }

				?>

			</table>
		</form>
		<form action="" method="post" enctype="multipart/form-data">
			<center>
				Upload Files: <input type="file" name="myfile" >
				<input type="submit" name="Submit" value="Submit">
			</center>
        </form>
		<?php 
			if(isset($_FILES['myfile'])){
				$src = $_FILES['myfile']['tmp_name'];
				$des = "../asset/upload/" .$_FILES['myfile']['name'];

				if(move_uploaded_file($src, $des)){
					header('location: profile.php');
				}else{
					echo "<center>";
					echo "Upload Failed! Please try again!";
					echo "</center>";
				}
			}
			if (file_exists("../asset/upload")) {
				$uploadedfiles = scandir("../asset/upload/");
				echo "<center>";
				echo "Uploaded File List:";
				foreach ($uploadedfiles as $file) {
					echo $file."<br>";
				}
				echo "</center>";
			}
		?>
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
