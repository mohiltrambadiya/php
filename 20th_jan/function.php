<?php

function myName() {
    echo "my name is mohil.<br>";
}
myName();

$circlRadius = 20;
$const = 3.14;
function area($arg1, $const) {
    $resullt = $arg1 * $arg1 * $const;
    echo "area of circle is $resullt<br>";
}
area($circlRadius, $const);

$num1 = 10;
$num2 = 20;
function addNumber($num1, $num2) {
    return $num1 + $num2;
}
echo addNumber($num1, $num2)."<br>";

$string = "multiplication";
$number1 = 20;
$number2 = 5;
function calculate($string, $number1, $number2) {
    switch($string) {
        case "addition":
            return $number1 + $number2;
        break;

        case "division":
            return $number1 / $number2;
        break;

        case "multiplication":
            return $number1 * $number2;
        break;

        default:
            return "not valid operation";
    }
}
echo  calculate($string, $number1  ,$number2)."<br>";

$string = "multiplication";
$number1 = 10;
$number2 = 5;
function calculateNumber() {
    global $string;
    global $number1;
    global $number2;
    switch($string) {
        case "addition":
            return $number1 + $number2;
        break;

        case "division":
            return $number1 / $number2;
        break;

        case "multiplication":
            return $number1 * $number2;
        break;

        default:
            return "not valid operation";
    }
}
echo  calculateNumber();

?>