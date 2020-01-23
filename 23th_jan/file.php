<?php

if(isset($_POST["name"]) && $_POST["name"] != null) {
    $userName = $_POST["name"];
    $hanle = fopen("username.txt", "a");
    fwrite($hanle, $userName);
    fclose($hanle);
    $readFile = readfile("username.txt");
    foreach($readFile as $name) {
        echo $name;
    }
}

?>

<form action="file.php" method="post">
    name:<input type="text" name="name">
    <input type="submit" name="submit" value="submit">
</form>

