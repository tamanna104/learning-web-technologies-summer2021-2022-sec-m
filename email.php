
<?php
//session_start();
$email = $_POST['email'];

if($email == null){
    echo "Field is empty";
}
if (strpos($email, ' ') !== false || strpos($email, '@gmail.com') == false ) {
	echo "invalid email";
}

else
{
    echo "Success";
}


?>