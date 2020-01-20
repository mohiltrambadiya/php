<?php
$x = 1;

while($x <= 5) {
    echo "The number is: $x <br>";
    $x++;
}
echo "<br>";
echo "<br>";

$y=1;
do{
    echo "number $y";
    $y++;
}while($y>9);
echo "<br>";
echo "<br>";

for($i=0; $i <= 10; $i++)
{
    echo $i+1;
}
echo "<br>";
echo "<br>";

$arr=array(1,2,3);
foreach($arr as $count)
{
    echo $count+1;
}
?>
