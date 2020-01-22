
<table border=1px>
<?php
    for($i = 1; $i <= 8; $i++) {
        if($i % 2 == 0) {
            echo "<tr>";
            for($j = 1; $j <= 8; $j++) {
            if($j % 2 == 0) {
                echo "<td style='background-color:black;padding:10px'></td>";
            }
            else {
                echo "<td style='background-color:greay;padding:10px'></td>";
            }
            }
            echo "</tr>";   
        }
        else {
            echo "<tr>";
            for($j = 1; $j <= 8; $j++) {
            if($j % 2 == 0) {
                echo "<td style='background-color:greay;padding:10px'></td>";
            }
            else {
                echo "<td style='background-color:black;padding:10px'></td>";
            }
            }
            echo "</tr>";
        }
    }
?>
</table>