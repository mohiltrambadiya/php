<?php

if(isset($_POST["roll"])) {
    $number = rand(1, 6);
    echo $number;
}

?>

<form action="randomno.php" method="POST">
    <input type="submit" name="roll" value="submit">
</form>