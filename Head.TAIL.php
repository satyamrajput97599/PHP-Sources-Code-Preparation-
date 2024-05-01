<?php

    $heads = 0;
    $tails = 0;
    for($i = 1; $i <= 100; $i++){

    $randNumber = rand(1,2);
    // echo "$randNumber";

    if($randNumber == 1){
        $heads++;
        // echo "Heads, I win! <br>";
    }
    else 
    {
        $tails++;
        // echo "Tails, You Win <br>";
    }
    }

    // echo "There were {$heads} heads and {$tails} tails";

    if($heads > $tails){
        echo "Heads, I win! <br>";
    }
    elseif($tails > $heads)
    {
        echo "Tails, You Win <br>";
    }
    else{
        echo"DRAW";
    }
?>