<table border=1px>
<?php
$row = 8;
for($i = 1; $i <= $row; $i++) {
    echo "<tr>";
    for($j = 1; $j < $i; $j++) {
        echo "<td>";
        echo "* ";
        echo "</td>";
    }
    echo "<br>";
    echo "</tr>";
}

?>
</table>