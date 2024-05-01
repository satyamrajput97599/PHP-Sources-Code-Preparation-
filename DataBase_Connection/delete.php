<?php

include 'connection.php';

$id = $_GET['id'];

$delete = "DELETE FROM jobregistration WHERE id=$id";

$query = mysqli_query($con,$delete);

header ("location:display.php");

?>
