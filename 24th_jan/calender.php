<?php
    extract($_POST);
    session_start();
    if(isset($month) && isset($year)) {
         $_SESSION["month"] = $month;
         $_SESSION["year"] = $year;
        calender($month, $year);

    }
    else if ($_SESSION["month"] != null && $_SESSION["year"] != null ) {
        calender($_SESSION["month"], $_SESSION["year"]);
    }
    else {
        echo 'Fill the fields.';
    }
    
    echo '<br>';
    function calender($month, $year) {
        $date = mktime(0,0,0,$month,1,$year);
        $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, (int)$month, (int)$year);
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

<form action="calender.php" method="POST">
    <label>Month : </label><input type="number" name="month"><br><br>
    <label>Year : </label><input type="number" name="year"><br><br>
    <input type="submit" value="Submit" name="submit">
</form>

<style>
    label{
        display : inline-block;;
        width : 70px;
    }
</style>