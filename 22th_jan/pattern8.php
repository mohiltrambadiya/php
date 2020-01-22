<?php

$counter = 0;
for($i = 1; $i < 6; $i++) {
    for($j = 1; $j <= $counter + $i; $j++) {
        echo "*";
    }
    for($k = 1; $k <= $i; $k++) {
        echo "0";
    }
    echo "<br>";
    $counter = $counter + $i;
}

?>

