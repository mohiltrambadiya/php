<table border=1px>
<?php
$row = 8;
$col = 8;
$number = 0;
for($i = 1; $i <= $row; $i++) {
    echo "<tr>";
    for($j = $i; $j < $col; $j++) {
        echo "<td>";
        echo "* ";
        echo "</td>";
    }
    echo "<br>";
    echo "</tr>";
}
?>
</table>  