<?php
    $src = $_FILES['myfile']['tmp_name'];
    $des = "../asset/upload/" .$_FILES['myfile']['name'];

    if(move_uploaded_file($src, $des)){
        header('location: ../controller/profile.php');
    }else{
        echo "Error";
    }

?>