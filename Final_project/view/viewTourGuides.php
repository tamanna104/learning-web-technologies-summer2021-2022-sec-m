<?php
	if(isset($_COOKIE['status'])){		
?>
<html>
	<head>
		<title>Tour Guides </title>
	</head>
	<header class="header">
		<a class="headLink" href="adminHome.php">Back</a>
		<h2>Tour Guides Info</h2>
		<a class="headLink" href="adminHome.php">Home</a>
	</header>
	<body>
		<?php 
			require_once "../model/tourGuideModel.php";
			$result = show();
			
			if(mysqli_num_rows($result))
			{
		?>
			
		<form>
			<br><br>
			<table border="3" align="center">
				<tr>
					<th>Name</th>
					<th>Password</th>
					<th>Email</th>
					<th>Address</th>
				</tr>
				<tbody>
					<?php
						while ($row1 = mysqli_fetch_assoc($result))
						{
							?>
							<tbody>
								<tr>
									<td><?php echo $row1['name']; ?></td>
									<td> <input type = 'password' disabled value = '<?php echo $row1["password"]; ?>'/></td>
									<td><?php echo $row1['email']; ?></td>
									<td><?php echo $row1['address']; ?></td>
								</tr>
							</tbody>
					<?php
						}
			}
			else{
				?>
				<center> <h3> <?php echo "No Tour Guides to show" ?></h3> </center>
				<?php
			}
				?>
				</tbody>
			</table>
		</form>
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
