<?php
		if(isset($_COOKIE['status'])){
            $managerId = $_GET['id'];
            // echo $adminId;
			
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css"> -->
    <script defer src="../asset/js/editManager.js"></script>
</head>
<body>
    <?php
        require_once "../model/managerModel.php";
        $result = showProfile($managerId);
        if(mysqli_num_rows($result))
        {
    ?>
    <div class="container">
        <form id="editManagerForm" method="post" class="adminForm">
            <h1>Edit Manager</h1>
            <?php
                while ($row1 = mysqli_fetch_assoc($result))
                { 
            ?>
            <input id="userId" name="userId" type="hidden" value="<?php echo $managerId; ?>">
            <div class="input-control">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" value="<?php echo $row1['name']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password">Password</label>
                <input id="password"name="password" type="password" value="<?php echo $row1['password']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="<?php echo $row1['email']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="contact">Contact</label>
                <input id="contact" name="contact" type="text" value="<?php echo $row1['contact']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="dob">Date of Birth</label>
                <input id="dob" name="dob" type="date" value="<?php echo $row1['dob']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="gender">Gender</label>
                <input id="gender" name="gender" type="text" value="<?php echo $row1['gender']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="address">Address</label>
                <input id="address" name="address" type="text" value="<?php echo $row1['address']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="bio">Bio</label>
                <textarea id="bio" rows="5" cols="40"><?php echo $row1['bio']; ?></textarea>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="website">Website</label>
                <input id="website" name="website" type="text" value="<?php echo $row1['website']; ?>">
                <div class="error"></div>
            </div>
            <div class="buttons">
                <button type="submit">Submit</button>
                <a href="viewManagers.php"> Back</a>
            </div>
        </form>
    </div>
    <?php
                }
            }
            else{
                echo "No Admin to show";
            }
?>
</body>

</html>

<style> 
    body {
      background-image: linear-gradient(rgb(251, 251, 251), rgb(129, 120, 252));
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .content {
      padding: 25px 60px;
      background-color: #FFF;
    }

    .adminForm {
        width: 28vw;
        padding: 20px;
        /* background-color: rgb(251, 251, 251); */
        border-radius: 4px;
    }

    .adminForm h1 {
        color: #024b6b;
        text-align: center;
    }

    .adminForm button {
        margin: 10px;
        padding: 10px;
        width: 100%;
        color: white;
        background-color: rgb(41, 57, 194);
        border: none;
        border-radius: 4px;
    }
    .adminForm a {
        margin: 10px;
        padding: 10px;
        width: 100%;
        color: white;
        background-color: rgb(41, 57, 194);
        border: none;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
    }
    .buttons {
        display: flex;
    }
    .input-control {
        display: flex;
        flex-direction: column;
    }

    .input-control label {
        font-size: 15px;
        font-weight: bold;
    }

    .input-control input {
        border: 2px solid #f0f0f0;
        border-radius: 4px;
        display: block;
        font-size: 12px;
        padding: 10px;
        width: 100%;
    }

    .input-control.success input {
        border-color: #09c372;
    }

    .input-control.error input {
        border-color: #ff3860;
    }

    .input-control .error {
        color: #ff3860;
        font-size: 13px;
        height: 15px;
        margin-bottom: 10px;
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