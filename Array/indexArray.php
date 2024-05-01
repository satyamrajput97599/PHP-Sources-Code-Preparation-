<?php

    // array();

    $student = array("Satyam","Aman","Rahul","Vijay"); 
    echo "<pre>";
    print_r($student);

    // print_r($student[2]);

    $student[4] = "Vishal";   //Adding element to the array
    $student[5] = "Chauhan";   //Adding element to the array
    print_r($student);

    echo $student[2];
    echo $student[1];


    $arraylength = count($student);
    echo $arraylength;

    echo "<ol>";
    for($i = 0; $i < $arraylength; $i++){
        echo "<li>". $student[$i] ."</li>";
    }
    echo "</ol>";
?>