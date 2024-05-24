<?php

session_start();

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$db = 'phppraticeyt';

$con = mysqli_connect($dbHost,$dbUsername,$dbPassword,$db);

if($con)
{

    // <script> 
    echo "connection successfully";
    //  </script>
    
}
else {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
}

?>