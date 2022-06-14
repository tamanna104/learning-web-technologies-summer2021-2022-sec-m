<?php
//session_start();
$username = $_POST['username'];

if($username == null){
    echo "Field is empty";
}
elseif($username != null)
{
    for($i=0; $i<10; $i++){
        if($username[0] == $i)
        {
            echo "invalid username";
        }
    
    }
}
else
{
    echo "Success";
}

?>