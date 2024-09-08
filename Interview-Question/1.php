<!-- Question 1 - Type Casting And Operators -->
<?php
$x = '5';
$y = 2;

echo $x + $y;
?>
<br>
<!-- Question 2 - Increment/Decrement  -->
<?php
 $x = 5;
 echo $x++ + ++$x; //12
//  echo $x++ + --$x; //10
?>

<!-- Question 3 - Type Comparisan -->
<br>

<?php
 $x = 'true';
 $y = true;
 echo $x == $y;
//  echo $x === $y; // False Not show on display
?>

<br>

<!-- Question 4 - Reference -->
<?php
$x = 10;
$y = &$x; // y = 10 & x ka address (memeory)
$y += 5; // y = 10 + 5 = 15 (x = 15)
echo $x + $y; // 15 + 15
?>

<br>

<!-- Question 5 - Reference & Variable Assignments -->
<?php
$fruit = 'apple';
$basket = & $fruit;
$basket = 'banana';

echo $fruit;
?>

<br>

<!-- Question 6 - Reference & Incremenet Operators -->
<?php
$first = 5;
$second = & $first;
$second++; // 5
echo $first * $second;
// 5 * 6
?>
<br>
<!-- Question 7 - Unset & Reference -->
<?php
$original = 'Hello';
$alias = & $original;
unset($original);
echo $alias;
?>

<br>
<?php
$a = "10";
$b = true;
echo $a + $b;
?>