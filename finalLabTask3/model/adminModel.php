<?php 
    require_once "db.php";

    function login($id, $password){
        $conn = getConnection();
		$sql = "select * from admin where id='{$id}' and password='{$password}'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

        if($count >0){
            return true;
        }else{
            return false;
        }
    }

<<<<<<< HEAD
    // function signup($user){
    //     $conn = getConnection();
	// 	$sql = "insert into users values('{$user['username']}', password='{$user['password']}'";
    //     if(mysqli_query($conn, $sql)){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
=======
    function signup($user){
        $conn = getConnection();
		$sql = "insert into users values('{$user['username']}', '{$user['password']}', '{$user['confirmpass']}', '{$user['email']}', '{$user['address']}'";
        if(mysqli_query($conn, $sql)){
            return true;
        }else{
            return false;
        }
    }
>>>>>>> 7a090bc4c0dbbd5cf10c1e31f86e01fdb59c190a

?>