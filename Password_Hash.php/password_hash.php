<?php

$pass = "satyam";



// $option = ['cost' => 12];
// $str_pass = password_hash($pass, PASSWORD_BCRYPT, $option);


$str_pass = password_hash($pass, PASSWORD_BCRYPT);

echo $str_pass;

$pass_check = password_verify($pass, $str_pass);

if($pass_check)
{
    echo  "<br>Password is correct.";
}
else{
    echo  "<br>Password not is correct.";
}


?>