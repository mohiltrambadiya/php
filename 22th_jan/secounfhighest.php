<?php

$numberArray = array(2, 5, 4, 87, 48, 23);

if($numberArray[0] > $numberArray[1]) {
    $frist = $numberArray[0];
    $secound = $numberArray[1];
}
else {
    $frist = $numberArray[1];
    $secound = $numberArray[0];
}

for($i = 2; $i <= 6; $i++) {
    if($frist < $numberArray[$i]) {
        $frist = $numberArray[$i];
    }
    elseif($secound < $numberArray[$i]) {
        $secound = $numberArray[$i];
    }
}
echo $secound;

?>