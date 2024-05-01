<?php

    $student = array("Satyam","Chauhan","Aman");

    rsort($student);
    // sort($student);

    echo "<ol>";
    foreach($student as $names){
        echo "<li>" . $names . "</li>";
    }
    echo "</ol>";


?>