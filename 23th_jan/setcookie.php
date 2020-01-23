<?php

if(isset($_POST["name"]) && isset($_POST["age"])) {
    setcookie("username", $_POST["name"], time()+100);
    setcookie("userage", $_POST["age"], time()+100);
    echo "cookie is set";
}
else {
    echo "cookie is not set";
}

?>

<form action="setcookie.php" method="post">
    name:<input type="text" name="name">
    age:<input type="text" name="age">
    <input type="submit" name="submit" value="submit">
</form>