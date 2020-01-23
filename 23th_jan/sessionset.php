<?php

session_start();
if(isset($_POST["name"]) && isset($_POST["age"])) {
    $_SESSION["username"] = $_POST["name"];
    $_SESSION["userage"] = $_POST["age"];
    echo "session is set";
}
else {
    echo "session is not set";
}

?>

<form action="sessionset.php" method="post">
    name:<input type="text" name="name">
    age:<input type="text" name="age">
    <input type="submit" name="submit" value="submit">
</form>