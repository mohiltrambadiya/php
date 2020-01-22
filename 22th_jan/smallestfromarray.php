<?php

$numberArray = array(2, 5, 8, 45, 25);
//$smallest = 0;
for($i = 1; $i < 5; $i++ ) {
    if($numberArray[0] > $numberArray[$i]) {
        $numberArray[0] = $numberArray[$i];
    }
    $result = $numberArray[0];
}
echo "smallest from the array is $result";


?>