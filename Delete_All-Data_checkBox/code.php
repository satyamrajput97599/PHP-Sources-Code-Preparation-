<?php
session_start();

include ('../DataBase_connection/connection.php');

if(isset($_POST['stud_delete_multiple_btn']))
{
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',' , $all_id);

    // echo $extract_id;

    $query = "DELETE from student where id IN($extract_id)";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Delete Successfully";
        header('location: delete_checkbox.php');
    }
    else 
    {
        $_SESSION['status'] = "Data not Delete";
        header('location: delete_checkbox.php');
    }
}

?>