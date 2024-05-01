<?php

    function arrayUnion($array1, $array2){
        $merge = array_merge($array1, $array2);
        echo "<pre>";
        print_r($merge);

        $result = array_unique($merge); //remove duplicates
        echo "<pre>";
        print_r($result);
    }
    $array1 = array('red','green', 'blue');
    $array2 = array('red','gold', 'black','green');

    arrayUnion($array1, $array2)

?>