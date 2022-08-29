<?php 
    require_once "db.php";

    function show()
    {
        $conn = getConnection();
        $sql = "select * from clients";
        $result = mysqli_query($conn, $sql);
        if($result){
            return $result;
        }else{
            return null;
        }

    }

    // client delete function
    if(isset($_POST['deleteIdRequest'])){
        $userId = $_POST['deleteIdRequest'];
        $conn = getConnection();
        $sql = "delete from clients WHERE id='{$userId}'";
        if (mysqli_query($conn, $sql)) {
            echo "deleted successfully";
        } else {
            echo "error";
        }
    }

?>