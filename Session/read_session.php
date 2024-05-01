<?php

session_start();

if(isset($_SESSION['username'])){
echo "My Name is " . $_SESSION['username'] . " and My age is " . $_SESSION['age'] ;
}
else {
    echo "No Username is set";
}
?>