<?php
		if(isset($_COOKIE['status'])){
        
			
?>
<?php 
	session_start();
	if(isset($_REQUEST['submit'])){
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirmpass = $_POST['confirmpass'];
		$email = $_POST['email'];
		$address = $_POST['address'];
        if($id != null && $username != null && $password != null && $confirmpass != null && $email != null && $address != null)
		{
			$guides = $id."|".$username."|".$password."|".$confirmpass."|".$email."|".$address."\r\n";
			$file = fopen('tourGuideList.txt', 'a');
			fwrite($file, $guides);
			header('location: viewTourGuides.php');
		} else {
            echo "<h1>Fields are empty</h1>";
        }
	
	}	
?>
<html>
  <head>
    <title>ADD NEW</title>
  </head>
  <body>
  <form method="post">
      <fieldset>
          <center>
            <legend><b>ADD NEW</b></legend>
            <table>
                <tr>
                    <td>
                        Id:<br />
                        <input type="text" name="id" value="" /><br />

                    </td>
                </tr>
                <tr>
                    <td>
                        Username:<br>
                        <input type="text" name="username" value="" /><br />
                    </td>
                </tr>  
                <tr>
                    <td>
                        Password:<br />
                        <input type="password" name="password" value="" /><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Confirm Password:<br>
                        <input type="password" name="confirmpass" value="" /><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:<br>
                        <input type="email" name="email" value="" /><br />
                    </td>
                </tr>  
                <tr>
                    <td>
                        Address:<br>
                        <input type="text" name="address" value="" /><br />
                    </td>
                </tr>  
                <tr>
                    <td>
                        <hr>
                        <a href="viewTourGuides.php"> Back </a>
                        <input type="submit" name="submit" value="Submit" />
                    </td>
                </tr>
            </table>
    
          </center>
        
      </fieldset>
    </form>
  </body>
</html>
<?php 
	}else{
		echo "invalid request";
	}  
?>

