<?php

$string = "my name is mohil .";
$string1 = "     your name is utsav.";
$wordCount = str_word_count($string);
echo "word count of string is $wordCount.<br>";

$presentArray = str_word_count($string, 1, ".");
print_r($presentArray);
echo "<br>";

$shuffled = str_shuffle($string);
echo $shuffled."<br>";

$halfString = substr($shuffled, 0, strlen($shuffled) / 2);
echo $halfString."<br>";

$stringReverse = strrev($string);
echo $stringReverse."<br>";

similar_text($string, $string1, $result);
echo $result."<br>";

$trimResult = trim($string1);
echo $trimResult."<br>";
?>