<?php
	if(isset($_COOKIE['status'])){		
?>
<html>
	<head>
		<title>Clients Info</title>
	</head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<header class="header">
		<a class="headLink" href="adminHome.php">Back</a>
		<h2>Clients Info</h2>
		<a class="headLink" href="adminHome.php">Home</a>
	</header>
	<body>
		<?php 
			require_once "../model/clientModel.php";
			$result = show();
			
			if(mysqli_num_rows($result))
			{
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
										<td><?php echo $row1['dob']; ?></td>
										<td><?php echo $row1['country']; ?></td>
										<td>
										<button onclick="deleteRow(<?= $row1['id'] ?>)">Remove</button>
										<!-- <button type='button'> <a href='../controller/adminEdit.php?id=$row1["id"]'>Edit</a></button> -->
										</td>
									</tr>
								</tbody>
							
						<?php
							}
			}
			else{
				?>
				<center> <h3> <?php echo "No Client to show" ?></h3> </center>
				<?php
			}
							?>
				</tbody>
			</table>
		</form>
		<br/>

	</body>
		<script>
			var deleteRow = function(id) {
				$.ajax({
					url: '../model/clientModel.php',
					type: 'POST',
					data: {deleteIdRequest: id},
					success: function(data) {
						if (data === 'error') {
							alert("Database connection error!")
						} else {
							window.location.reload();
						}
					}
				});
			};
		</script>
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