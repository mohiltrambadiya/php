<?php

$number = 153;
$result = 0;
while($number != 0) {
    $temp = $number % 10;
    $cube = $temp * $temp * $temp;
    $result = $result + $cube;
    $number = $number / 10; 
}
if($result != null) {
    echo "number is aramstrong";
}
else {
    echo "not aramstrong";
}

?>