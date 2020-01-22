<?php

$flag = 0;
$number = 11;
for($i = 2; $i < $number; $i++) {
    if($number  % $i == 0) {
        $flag = 1;
    }
}
if($flag == 1) {
    echo "not prime";
}
else {
    echo "prime";
}

?>