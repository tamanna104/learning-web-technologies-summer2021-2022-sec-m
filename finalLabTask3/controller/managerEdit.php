<?php
    $adminId = $_GET['id'];
    $adminInfo ='';
    $file = fopen('../model/managerList.txt', 'r');
    while (!feof($file)) {
        $data=fgets($file);
        $managers = explode('|', $data);
        if(isset($managers) && sizeof($managers) > 1 && $managers[0] == $adminId)
        {
            $GLOBALS['adminInfo'] = $managers;
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
        
		$file = fopen('../model/managerList.txt', 'r');
		while (!feof($file)) {
			$data=fgets($file);
			$managers = explode('|', $data);
			if(isset($managers) && sizeof($managers) > 1)
			{
				if($managers[0] == $GLOBALS['adminId'])
                {
                    $updatedData = $_POST['id']."|".$_POST['username']."|".$_POST['password']."|".$_POST['email']."|".$_POST['contact']."|".$_POST['dob']."|".$_POST['gender']."|".$_POST['address']."|".$_POST['bio']."|".$_POST['website']."\r\n";
                }
                else
                {
                    $updatedData = $managers[0]."|".$managers[1]."|".$managers[2]."|".$managers[3]."|".$managers[4]."|".$managers[5]."|".$managers[6]."|".$managers[7]."|".$managers[8]."|".$managers[9];
                }
                $newFile = fopen('../model/temp.txt', 'a');
				fwrite($newFile, $updatedData);
				fclose($newFile);
			}
		}
        fclose($file);
        unlink('../model/managerList.txt');
        rename('../model/temp.txt', '../model/managerList.txt');
        header('location: ../view/viewManagers.php');

	}
?>
<html>
  <head>
    <title>MANAGER INFO EDIT</title>
  </head>
  <body>
    <form method="post">
      <fieldset>
          <center>
            <legend><b>MANAGER INFO EDIT</b></legend>
            <div class="content">
            <table>
               
                <tr>
                    <td>
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
                        Email:<br>
                        <input type="email" name="email" value="<?php echo $GLOBALS['adminInfo']['3']; ?>" /><br />
                    </td>
                </tr> 
                <tr>
                    <td>
                        Contact:<br>
                        <input type="text" name="contact" value="<?php echo $GLOBALS['adminInfo']['4']; ?>" /><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Date of Birth:<br>
                        <input type="date" name="dob" value="<?php echo $GLOBALS['adminInfo']['5']; ?>" /><br />
                    </td>
                </tr> 
                <tr>
                    <td>
                        Gender:<br>
                        <input type="text" name="gender" value="<?php echo $GLOBALS['adminInfo']['6']; ?>" /><br />
                    </td>
                </tr> 
                <tr>
                    <td>
                        Address:<br>
                        <input type="text" name="address" value="<?php echo $GLOBALS['adminInfo']['7']; ?>" /><br />
                    </td>
                </tr> 
                <tr>
                    <td>
                        Bio:<br>
                        
                        <textarea id="story" name="bio"rows="5" cols="33"><?php echo $GLOBALS['adminInfo']['8']; ?></textarea><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Website:<br>
                        <input type="text" name="website" value="<?php echo $GLOBALS['adminInfo']['9']; ?>" /><br />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <hr>
                        <button type='submit' name='editAdmin' value='$id'>Save</button>
                        <a href="../view/viewManagers.php">Back</a>
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

