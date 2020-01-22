<?php

$number1 = 30;
$number2 = 20;
$result = 0;

for($i = 1; $i < $number1 && $i < $number2; $i++) {
    if($number1 % $i == 0 && $number2 % $i == 0) {
        $result = $i;
    }
}
$lcm = ($number1 * $number2) / $result; 
    echo "LCM is $lcm";

?>