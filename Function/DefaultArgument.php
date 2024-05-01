<?php

    function mul($a , $b=20){
        $mult = $a * $b;
        
        // echo $mul ."</br>";
        return $mult;
    }

    // mul(10,20);
    // mul(4,20);
    // mul(9,20);
    // mul(10);
    // mul(6);
    // mul(6,4);

    $output = mul(10,4);
    $output2 = mul(20,7);

    echo "the Multiply of two Number is " . $output;
    echo "the Multiply of two Number is " . $output2;
    echo "the Multiply of two Number is " . $output;
    echo "the Multiply of two Number is " . $output2;

?>