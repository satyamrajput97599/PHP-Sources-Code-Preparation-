<?php
include('config.php');

if(isset($_POST['sublogin']))
{
    $login = $_POST['login_var'];
    $password = $_POST['password'];

    // Verify database connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM users WHERE (username='$login' OR email='$login')";
    $res = mysqli_query($con, $query);

    if (!$res) {
        die("Query failed: " . mysqli_error($con));
    }

    $numRows = mysqli_num_rows($res);
    if($numRows == 1)
    {
        $row = mysqli_fetch_assoc($res);
        if(password_verify($password, $row['password'])){
            session_start(); // Start the session
            $_SESSION["login_sess"] = "1";
            $_SESSION["login_email"] = $row['email'];
            header("Location: account.php");
            exit(); // Always exit after a header redirect
        }
        else {
            header("Location: login.php?loginerror=".urlencode($login)); // urlencode the login variable
            exit(); // Always exit after a header redirect
        }
    }
    else {
        header("Location: login.php?loginerror=".urlencode($login)); // urlencode the login variable
        exit(); // Always exit after a header redirect
    }
}

?>
