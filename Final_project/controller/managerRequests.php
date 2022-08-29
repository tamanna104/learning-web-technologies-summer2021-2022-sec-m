<?php
	if(isset($_COOKIE['status'])){		
?>
<html>
    <head>
        <title>Manager Request Info</title>
    </head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <header class="header">
        <a class="headLink" href="../view/viewManagers.php">Back</a>
        <h2>Manager Request Info</h2>
        <a class="headLink" href="../view/adminHome.php">Home</a>
    </header>
    <body>

    <div class="manreq">

        <?php 
                require_once "../model/managerModel.php";
                $result = showManagerRequest();
                
                if(mysqli_num_rows($result))
                {
            ?>
                    <br><br>
                    <table border="3" align="left">
                        <tr>
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
                                        <button onclick="hire(<?= $row1['id'] ?>)">Hire</button>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                }
                else{
                    ?>
                    <center> <h3> <?php echo "No Manager Requests to show" ?></h3> </center>
                    <?php
                }
                            ?>
                        </tbody>
                    </table>
            <br/>
            <br/>
    </div>

    </body>
    <script>
        var hire = function(id) {
            $.ajax({
                url: '../model/managerModel.php',
                type: 'POST',
                data: {addIdRequest: id},
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

    body .manreq{
        width: 90%;
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
	}
	td {
		padding: 5px 15px;
	}
    .hire{
        text-align: center;
    }
</style>
<?php
		}
?>

