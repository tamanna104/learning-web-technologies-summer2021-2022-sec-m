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
        if($id == null && $username == null && $password == null && $confirmpass == null && $email == null && $address == null)
		{
			echo "Please fill up the fields";
		} 
        else if($username == null || is_numeric($username[0]) || str_contains($username[0],' ') || str_contains($username,'%') || str_contains($username,'$') || str_contains($username,'*') )
		{
			echo "Invalid name. ";
		}
		else if(strlen($password) < 8 || strlen($password) > 16)
		{
			echo "Password must be between 6 and 16 characters in length. ";
		}
		else if (strpos($password, '(')=== false && strpos($password, '&')=== false && strpos($password, '}')=== false && strpos($password, '{')=== false && strpos($password, '%')=== false && strpos($password, '!')=== false && strpos($password, '#')=== false && strpos($password, '@')=== false && strpos($password,'+')=== false && strpos($password,'_')=== false && strpos($password,'.')=== false)
		{
			echo "Password is weak. Must contain a special character. ";
		}
		else if($password != $confirmpass)
		{
			echo "Password and confirm password doesn't match. ";
		}
        else {
            $user = $id."|".$username."|".$password."|".$confirmpass."|".$email."|".$address."\r\n";
			$file = fopen('adminList.txt', 'a');
			fwrite($file, $user);
			header('location: viewAdmins.php');
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
          <center class="content">
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
                        <input type="submit" name="submit" value="Submit" />
                        <a href="viewAdmins.php"> Back </a>
                    </td>
                </tr>
            </table>
    
          </center>
        
      </fieldset>
    </form>
  </body>
</html>
<style> 
    body {
      background-image: linear-gradient(rgb(251, 251, 251), rgb(129, 120, 252));
      display: flex;
      justify-content: center;
      align-items: center;
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
    .register {
      text-align: center;
    }
  </style>

<?php 
	}else{
		echo "invalid request";
	}  
?>
