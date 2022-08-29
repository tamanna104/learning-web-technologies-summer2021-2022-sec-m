<?php 
    require_once "db.php";

    function showManagers()
    {
        $conn = getConnection();
        $sql = "select * FROM managers WHERE accepted = '1'";
        $result = mysqli_query($conn, $sql);
        if($result){
            return $result;
        }else{
            return null;
        }

    }
    function showManagerRequest()
    {
        $conn = getConnection();
        $sql = "select * FROM managers WHERE accepted = '0'";
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
        $sql = "select * from managers where id='{$id}'";
        $result = mysqli_query($conn, $sql);
        if($result){
            return $result;
        }else{
            return null;
        }
    }

    //manager add function
    if(isset($_POST['addIdRequest'])){
        $userId = $_POST['addIdRequest'];
        $conn = getConnection();
        $sql = "update managers
        set accepted = '1'
        where id ='{$userId}'";
        if (mysqli_query($conn, $sql)) {
            echo "added successfully";
        } else {
            echo "error";
        }
    }


    // user delete function
    if(isset($_POST['deleteIdRequest'])){
        $userId = $_POST['deleteIdRequest'];
        $conn = getConnection();
        $sql = "delete from managers WHERE id='{$userId}'";
        if (mysqli_query($conn, $sql)) {
            echo "deleted successfully";
        } else {
            echo "error";
        }
    }

?>