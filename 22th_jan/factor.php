<?php

$number = 16;

for($i = 1; $i <= $number; $i++) {
    if($number % $i == 0) {
        echo "factor is $i<br>";
    }
}

?>