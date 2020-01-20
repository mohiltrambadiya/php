<?php
if(1)
{
    echo "ok!! true";
}
else{
    echo "false";
}
echo "<br>";

$txt="hello";
if($txt=="olleh")
{
    echo "true";
}
else
{
    echo "false";
}
echo "<br>";

$a=4;
$b='4';
if($a==$b)
{
    echo "is equal";
}
else if($a===$b)
{
    echo "is also equal";
}
else
{
    echo "not equal";
}
echo "<br>";

$c=5;
$d=6;
$e=10;
if($c>$d && $c>$e)
{
    echo "c is large";
}
else if($d>$e && $d>$c)
{
    echo "d is larger";
}
else
{
    echo "e is larger";
}
echo "<br>";
?>