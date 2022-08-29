<?php
	if(isset($_COOKIE['status'])){		
?>
<html>
	<head>
		<title>Manager Info</title>
	</head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<header class="header">
		<a class="headLink" href="adminHome.php">Home</a>
		<h2>Manager Info</h2>
		<a class="headLink" href="../controller/managerRequests.php">Manager Requests</a>
	</header>
	<body>
		<?php 
			 require_once "../model/managerModel.php";
			 $result = showManagers();
			 
			 if(mysqli_num_rows($result))
			 {
		?>
			<div class="managerreq">
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
						<tbody>
						<?php
							while ($row1 = mysqli_fetch_assoc($result))
							{
								?>
								<tbody>
									<tr>
										<td><?php echo $row1['id']; ?></td>
										<td><?php echo $row1['name']; ?></td>
										<td> <input type = 'password' disabled value = '<?php echo $row1["password"]; ?>'/></td>
										<td><?php echo $row1['email']; ?></td>
										<td><?php echo $row1['contact']; ?></td>
										<td><?php echo $row1['dob']; ?></td>
										<td><?php echo $row1['gender']; ?></td>
										<td><?php echo $row1['address']; ?></td>
										<td><?php echo $row1['bio']; ?></td>
										<td><?php echo $row1['website']; ?></td>
										<td>
										<button onclick="deleteRow(<?= $row1['id'] ?>)">Delete</button>
										<button type='button'> <a href='../view/editManager.php?id=<?php echo $row1['id']; ?>'>Edit</a></button>
										</td>
									</tr>
								</tbody>
							<?php
							}
				}
				else{
					?>
					<center> <h3> <?php echo "No Manager to show" ?></h3> </center>
					<?php
				}
							?>
						 </tbody>
					</table>
				</form>
			</div>
		<br/>

	</body>
	<script>
        var deleteRow = function(id) {
            $.ajax({
                url: '../model/managerModel.php',
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

    body .managerreq{
		display: flex;
		width: 100%;
		height: 100vh;
    }

    body .managerreq table{
		align-items: center;
		justify-content: center;
		width: 100%;
		height: 100vh;
    }
	

	.header {
		padding: 0px 15px;
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
      padding: 2px 6px;
      background-color: #FFF;
    }
    

	th {
		padding: 2px 5px;
		text-align: center;
	}
	td {
		padding: 2px 5px;
		text-align: center;
	}
</style>
<?php 
	}else{
		echo "invalid request";
	}  
?>

