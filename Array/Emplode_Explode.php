<?php

    // $color = array('red', 'green', 'blue','yellow');

    // print_r($color);
    // echo "<br>";
    // $res = implode("+ ", $color);
    // echo "My Fav Color are :- " . $res;

    echo "<br><br>";

    $bio = "My name is Satyam Chauhan";

    $res = explode(" ", $bio);
    echo "<pre>";
    print_r($res);

    foreach($res as $val){
        echo  $val." ";
    }
    


?>