<?php

$number = 123;
$sum = 0;
while($number > 1) {
    $temp = $number % 10;
    $sum = ($sum * 10) + $temp;
    $number = ($number / 10);
}
echo $sum;

?>