<?php 
    require_once "db.php";

    function show()
    {
        $conn = getConnection();
        $sql = "select * from tguides";
        $result = mysqli_query($conn, $sql);
        if($result){
            return $result;
        }else{
            return null;
        }

    }
?>