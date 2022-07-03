<?php
	$listUpdated = false;
	if (isset($_POST['hireManager'])) {
		hireManager();
		$GLOBALS['listUpdated'] = true;
	}
	function hireManager() {
		$updatedData = "";
		$selectedId = $_POST['hireManager'];
		$file = fopen('managerRequestList.txt', 'r');
		while (!feof($file)) {
			$data=fgets($file);
			$user = explode('|', $data);
			if(isset($user) && sizeof($user) > 1 && $user[0] == $selectedId)
			{
				$updatedData = $user[0]."|".$user[1]."|".$user[2]."|".$user[3]."|".$user[4]."|".$user[5]."|".$user[6]."|".$user[7]."|".$user[8]."|".$user[9];
				$newFile = fopen('managerList.txt', 'a');
				fwrite($newFile, $updatedData);
				fclose($newFile);
			}
		}
	}
	if(isset($_COOKIE['status'])){		
?>
<html>
<head>
	<title>Manager Request Info</title>
</head>
<header class="header">
	<a class="headLink" href="viewManagers.php">Back</a>
	<h2>Manager Request Info</h2>
	<a class="headLink" href="adminHome.php">Home</a>
</header>
<body>
    <form method="post">
            <?php
                $file = fopen('managerRequestList.txt', 'r');
                while (!feof($file)) 
                {
                    echo '<br>';
                    echo '<table border="3" align="center">';
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
                        //name, pass, email, contact no, Dob, gender, address, bio, website
                        echo "<tr>";
                        echo "<td><b>Name: </b>".$name."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><b>Password: </b>".$password."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><b>Email: </b>".$email."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><b>Contact No: </b>".$contact."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><b>Date Of Birth: </b>".$dob."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><b>Gender: </b>".$gender."</td>";
                        echo "</tr>";
                        echo "<td><b>Address: </b>".$address."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><b>Bio: </b>".$bio."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><b>Website: </b>".$website."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td class='hire'>
                        <button type='submit' name='hireManager' value='$id'>Hire</button>
                        </td>";
                        echo "</tr>";
                        echo '<br>';
                    }
                    echo '</table>';

                }
            ?>

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