<?php

$username = 'root';
$password = '';
$server = "localhost";
$database = 'phppraticeyt';

$con = mysqli_connect($server,$username,$password,$database);
if($con){
    // echo "connected successfully!<br>";
    ?>
    <script>
        // alert('connected successfully!');
    </script>
    <?php
}
else{
    // echo "Connection Failed";
    die("no connection" . mysqli_connect_error());
}

?>