<?php

$number = 1;
for($i = 1; $i <= 8; $i++) {
    for($j = 1; $j < $i; $j++) {
        echo $number." ";
        $number++;
    }
    echo "<br>";
}

?>