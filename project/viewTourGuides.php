<?php
	if(isset($_COOKIE['status'])){		
?>
<html>
<head>
	<title>Tour Guides Info</title>
</head>
<header class="header">
	<a class="headLink" href="adminHome.php">Back</a>
	<h2>Tour Guides Info</h2>
	<a class="headLink" href="adminHome.php">Home</a>
</header>
<body>
	<form>
		<br><br>
		<table border="3" align="center">
			<tr>
				<th>id</th>
				<th>name</th>
				<th>password</th>
				<th>email</th>
				<th>address</th>
			</tr>
			<?php
				
				$file = fopen('tourGuideList.txt', 'r');
				while (!feof($file)) 
				{
					$data=fgets($file);
					$guides = explode('|', $data);
					
					if(isset($guides) && sizeof($guides) > 1)
					{
						$id = trim($guides[0]);
						$username = trim($guides[1]);
						$password = trim($guides[2]);
						$email = trim($guides[4]);
						$address = trim($guides[5]);
						echo "<tr>";
						echo "<td>".$id."</td>";
						echo "<td>".$username."</td>";
						echo "<td>".$password."</td>";
						echo "<td>".$email."</td>";
						echo "<td>".$address."</td>";
						echo "</tr>";
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