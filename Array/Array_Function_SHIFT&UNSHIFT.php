<?php

    $student = array('satyam','chauhan','rajput');
    echo "<pre/>";
    print_r($student);

    array_shift($student);
    echo "<pre/>";
    print_r($student);

    array_unshift($student,'satyam'); // (String,value);
    echo "<pre/>";
    print_r($student);

?>