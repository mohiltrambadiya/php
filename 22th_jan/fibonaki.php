<?php

$a = 0;
$b = 1;
$c = 0;
echo $a."<br>";
$number = 10;
for($i = 0; $i < $number; $i++) {
       $a = $b;
       $b = $c;
       $c = $a + $b;
       echo $c."<br>";
}

?>