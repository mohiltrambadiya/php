<table border=1px>
<?php

for($i = 1; $i <= 6; $i++) {
    echo "<tr>";
    for($j = 1; $j <= 5; $j++) {
        echo "<td>";
        $result = $i * $j;
        echo "$i*$j=$result"." ";
        echo "</td>";
    }
    echo "<br>";
    echo "</tr>";
}

?>