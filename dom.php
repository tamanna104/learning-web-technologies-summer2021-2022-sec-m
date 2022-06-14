<?php
//session_start();
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];

if($day == null || $month == null || $year == null ){
    echo "Field is empty";
}