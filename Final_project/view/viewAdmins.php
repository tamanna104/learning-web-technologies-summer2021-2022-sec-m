<?php
	if(isset($_COOKIE['status'])){		
?>
<html>
    <head>
        <title>AdminList Info</title>
	</head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<header class="header">
		<a class="headLink" href="adminHome.php">Home</a>
		<h2>AdminList Info</h2>
		<a class="headLink" href="../view/addAdmin.html">Add New</a>
	</header>


    <body>
        <br/>
        <br/>
        <?php
            require_once "../model/adminModel.php";
            $result = show();
            
            if(mysqli_num_rows($result))
            {
        ?>
            <table border="3" align="center">
                <thead>
                    <th>name</th>
                    <th>password</th>
                    <th>email</th>
                    <th>address</th>
                    <th>actions</th>
                </thead>
                <tbody>
                    <?php
                        while ($row1 = mysqli_fetch_assoc($result))
                        {
                            if($row1['id'] == $_COOKIE['myId'])
                            {
                                continue;
                            }
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row1['username']; ?></td>
                                    <td> <input type = 'password' disabled value = '<?php echo $row1["password"]; ?>'/></td>
                                    <td><?php echo $row1['email']; ?></td>
                                    <td><?php echo $row1['address']; ?></td>
                                    <td>
                                    <button onclick="deleteRow(<?= $row1['id'] ?>)">Delete</button>
                                    <button type='button'> <a href='../view/editAdmin.php?id=<?php echo $row1['id']; ?>'>Edit</a></button>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        }
            }
            else{
                echo "No Admin to show";
            }
                        ?>
                </tbody>
            </table>
    </body>
    <script>
        var deleteRow = function(id) {
            $.ajax({
                url: '../model/adminModel.php',
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