<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'email_registration_activate';

$con = mysqli_connect($server,$user,$password,$db);

if($con) {
    echo "Connection Successfully";
}
else
{
    echo "NO Connection";
}


?>