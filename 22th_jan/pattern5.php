<?php

$row = 4;
for($i = 1; $i <= $row; $i++) {
        echo "<tr>";
        echo $i." ";
        $temp =  $i+4;
        echo $temp." ";
        echo $temp + 4;
        echo "<br>";
        echo "</tr>";
}

?>