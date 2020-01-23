<?php

session_start();
echo "welcome, ".$_SESSION["username"]."<br>";
echo "your age is".$_SESSION["userage"];

?>