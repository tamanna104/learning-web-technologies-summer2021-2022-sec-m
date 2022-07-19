<?php
    $adminId = $_GET['id'];
    $adminInfo ='';
    $file = fopen('../model/adminList.txt', 'r');
    while (!feof($file)) {
        $data=fgets($file);
        $user = explode('|', $data);
        if(isset($user) && sizeof($user) > 1 && $user[0] == $adminId)
        {
            $GLOBALS['adminInfo'] = $user;
            break;
        }
    }
    fclose($file);
    $listUpdated = false;
	if (isset($_POST['editAdmin'])) {
		editAdmin();
		$GLOBALS['listUpdated'] = true;
	}
	function editAdmin() {
		$updatedData = "";
        
		$file = fopen('../model/adminList.txt', 'r');
		while (!feof($file)) {
			$data=fgets($file);
			$user = explode('|', $data);
			if(isset($user) && sizeof($user) > 1)
			{
				if($user[0] == $GLOBALS['adminId'])
                {
                    $updatedData = $_POST['id']."|".$_POST['username']."|".$_POST['password']."|".$_POST['confirmpass']."|".$_POST['email']."|".$_POST['address']."\r\n";
                }
                else
                {
                    $updatedData = $user[0]."|".$user[1]."|".$user[2]."|".$user[3]."|".$user[4]."|".$user[5];
                }
                $newFile = fopen('../model/temp.txt', 'a');
				fwrite($newFile, $updatedData);
				fclose($newFile);
			}
		}
        fclose($file);
        unlink('../model/adminList.txt');
        rename('../model/temp.txt', '../model/adminList.txt');
        header('location: ../view/viewAdmins.php');

	}
?>
<html>
  <head>
    <title>Admin Info Edit</title>
  </head>

  <body>
    <form method="post">
      <fieldset>
          <center>
            <legend><b>ADMIN INFO EDIT</b></legend>
            <div class="content">
            <table>
               
                <tr>
                    <td>
                        Id:<br />
                        <input type="text" name="id" value="<?php echo $GLOBALS['adminInfo']['0']; ?>" /><br />

                    </td>
                </tr>
                <tr>
                    <td>
                        Username:<br>
                        <input type="text" name="username" value="<?php echo $GLOBALS['adminInfo']['1']; ?>" /><br />
                    </td>
                </tr>  
                <tr>
                    <td>
                        Password:<br />
                        <input type="password" name="password" value="<?php echo $GLOBALS['adminInfo']['2']; ?>" /><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Confirm Password:<br />
                        <input type="password" name="confirmpass" value="<?php echo $GLOBALS['adminInfo']['3']; ?>" /><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:<br>
                        <input type="email" name="email" value="<?php echo $GLOBALS['adminInfo']['4']; ?>" /><br />
                    </td>
                </tr>  
                <tr>
                    <td>
                        Address:<br>
                        <input type="text" name="address" value="<?php echo $GLOBALS['adminInfo']['5']; ?>" /><br />
                    </td>
                </tr>  
                <tr>
                    <td>
                        <hr>
                        <button type='submit' name='editAdmin' value='$id'>Save</button>
                        <a href="../view/viewAdmins.php">Back</a>
                    </td>
                </tr>
                
            </table>
            </div>
    
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