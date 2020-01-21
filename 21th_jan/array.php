<?php

$animalArray = array("cat", "cow", "dog", "rabbit");
for($i = 0; $i <= 4;  $i++) {
    echo $animalArray[$i]."<br>";
}

$playerArray = array("virat" => 100, "rohit" => 200, "raina" => 500, "dhoni" => 800);
print_r($playerArray);
echo "<br>";
echo $playerArray["virat"]."<br><br>";
foreach($playerArray as $key => $value)
{
    echo "key ".$key." value ".$value."<br>";
}
echo "<br>";

$gameArray = array("outdoor" => array("cricket", "hockey", "football"), 
             "indoor" => array("caram", "chess", "table tennis"));
echo $gameArray["outdoor"][1]."<br><br>";
foreach($gameArray as $key => $item) {
    echo "<strong>$key</strong><br>";
    foreach($item as $innerItem) {
        echo $innerItem."<br>";
    }
}

?>