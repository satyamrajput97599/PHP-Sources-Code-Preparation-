<?php

//              PHP str_replace() function
// The str_replace() function replace some character with some other characters in a string.
// Note: This function is case-sensitive. Use the str_ireplace() function to perform a case-insensitive search. 

    // echo str_ireplace("SaTyaM", "Rajput", "Satyam Chauhan");

    $name = "Satyam|Chauhan|Rajput";
    
    echo str_replace("|", ", ", $name)

?>