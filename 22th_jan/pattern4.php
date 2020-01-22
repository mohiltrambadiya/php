<table border=1px>
<?php

$row = 8;
$col = 8;
for($i = 1; $i <= $row; $i++) {
    echo "<tr>";
    $number = 1;
    for($j = $i; $j <= $col; $j++) {
        echo "<td>";
        echo $number." ";
        $number++;
        echo "</td>";
    }
    echo "<br>";
    echo "</tr>";
}

?>  
</table>