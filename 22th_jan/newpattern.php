<table border=1px>
<?php

$row = 5;
$col = 5;
for($i = 1; $i <= $row; $i++) {
    echo "<tr>";
    for($j = 1; $j <= $col; $j++) {
        if($i == 1 || $i == 5 || $j == 1 || $j == 5) {
            echo "<td>";
            echo "*";
            echo "</td>";
        }
        else {
            echo "<td>";
            echo "&nbsp&nbsp";
            echo "</td>";
        }
    }
    echo "</tr>";
}
?>

</table>