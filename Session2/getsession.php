<?php 

session_start();

if(isset($_SESSION['username'])) {
    echo "My Name is " . $_SESSION['username'];
    echo "<br> My Password is " . $_SESSION['pass'] ;
}
else {
    // Optionally handle the case where no session variables are set
    echo "No session information available.";
}

?>