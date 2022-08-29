<?php 
    require_once "db.php";

    function login($username, $password){
        $conn = getConnection();
		$sql = "select * from admin where username='{$username}' and password='{$password}'";
        
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];
        setcookie('myId', $id, time()+6000000, '/');


        if($count >0){
            return true;
        }else{
            return false;
        }
    }

    function signup($username, $password, $email, $address){
        $conn = getConnection();
        $sql = "insert into admin (username, password, email, address) values('{$username}', '{$password}', '{$email}', '{$address}')";
        if(mysqli_query($conn, $sql)){
            return true;
        }else{
            return false;
        }
    }
    function show()
    {
        $conn = getConnection();
        $sql = "select * from admin";
        $result = mysqli_query($conn, $sql);
        if($result){
            return $result;
        }else{
            return null;
        }

    }

    function showProfile($id)
    {
        $conn = getConnection();
        $sql = "select * from admin where id='{$id}'";
        $result = mysqli_query($conn, $sql);
        if($result){
            return $result;
        }else{
            return null;
        }
    }


    // admin delete function
    if(isset($_POST['deleteIdRequest'])){
        $userId = $_POST['deleteIdRequest'];
        $conn = getConnection();
        $sql = "delete from admin WHERE id='{$userId}'";
        if (mysqli_query($conn, $sql)) {
            echo "deleted successfully";
        } else {
            echo "error";
        }
    }

    //admin password update
    if(isset($_POST['editIdRequest'])){
        $userId = $_POST['editIdRequest'];
        $conn = getConnection();
        $sql = "update admin set password='$newPass' where id='$myId";
        if (mysqli_query($conn, $sql)) {
            echo "deleted successfully";
        } else {
            echo "error";
        }
    }

?>