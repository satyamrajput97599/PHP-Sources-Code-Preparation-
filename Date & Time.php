<?php

    echo date('d l M'). "<br>";

    echo date('h:i:sA'). "<br>";

    $timezone = date_default_timezone_get();
    echo "The Current server timezone is: " . $timezone ."<br>"; 

    
    date_default_timezone_set('Asia/kolkata');
    echo "<br>";
    echo date('d l M'). "<br>";

    echo date('h:i:sA'). "<br>";

?>