<?php   

extract($_POST);
if(isset($frommonth) && isset($tomonth) && isset($year)) {
    for ($i = $frommonth; $i <= $tomonth; $i++) {
        calender($i, $year);
    }
}

function calender ($month, $year) {
        $date = mktime(0,0,0,$month,1,$year);
        $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, $month, (int)$year);
        $offset = date("w", $date);
        $rows = 1;

        echo "<table border=\"1\">\n";
        echo "\t<tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr>";
        echo "\n\t<tr>";
        
        for($i = 1; $i <= $offset; $i++) {
            echo "<td></td>";
        }
        
        for($day = 1; $day <= $totalDaysOfMonth; $day++) {
            if(($day + $offset - 1) % 7 == 0)
            {
                echo "</tr>\n\t<tr>";
                $rows++;
            }
            echo "<td>".$day."</td>";
        }

        while( ($day + $offset) <= $rows * 7) {
            echo "<td></td>";
            $day++;
        }

        echo "</tr>\n";
        echo "</table>\n";
}

?>
<form action="rangcalender.php" method="POST">
    <label>fromMonth : </label><input type="number" name="frommonth"><br><br>
    <label>toMonth : </label><input type="number" name="tomonth"><br><br>
    <label>Year : </label><input type="number" name="year"><br><br>
    <input type="submit" value="Submit" name="submit">
</form>
