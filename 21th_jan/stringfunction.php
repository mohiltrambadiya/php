<?php

$string = "cricket";
$stringLength = strlen($string);
echo $stringLength."<br>";

$convertIntoUpper = strtoupper($string);
echo $convertIntoUpper."<br>";

$uppercaseString = "CRICKET";
$convertIntoLower = strtolower($uppercaseString);
echo $convertIntoLower."<br>";

$stringForPosition = "this is my car and this bike is also my.";
$find = "my";
$position = strpos($stringForPosition, $find, 10);
echo $position."<br>";

$name = "mohil";
$stringForReplace = "my name is virat.";
$ans = substr_replace($stringForReplace, $name, 11, 5 );
echo $ans."<br>";

$newString  = "this is an example string";
$replaceAns = str_replace("an", " ", $newString);
echo $replaceAns;

?>