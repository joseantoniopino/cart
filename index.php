<?php
// Create bag array element with 100 numbers
$bag = range(1,100);

// We select a number from the bag
$number = rand(reset($bag),end($bag));
// $number = rand($bag[0],count($bag)); -> Other solution for pick a random number.

// We discard the number
unset($bag[array_search($number,$bag)]);

// We iterate the bag until we find the missing number. Then we show it.
foreach ($bag as $b)
{
    if ($b+1 == $number)
        echo "The missing number is: " . ($b+1) . " >> $number <br>";
}