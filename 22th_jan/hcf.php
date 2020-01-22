<?php

$number1 = 20;
$number2 = 50;
$result = 0;

for($i = 1; $i < $number1 && $i < $number2; $i++) {
    if($number1 % $i == 0 && $number2 % $i == 0) {
        $result = $i;
    }
}
echo "HCF is $result";

?>