<?php

    $student = array('satyam','chauhan','rajput');
    echo "<pre>";
    print_r($student);

    array_pop( $student ); // remove the last element of an array
    echo "<pre>";
    print_r($student);

    array_push($student, "kumar");  // add elements to an existing
    echo "<pre>";
    print_r($student);
?>