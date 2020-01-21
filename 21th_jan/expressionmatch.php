<?php

function stringMatching($string) {
    if(preg_match("/is/", $string)) {
        return true;
    }
    else {
        return false;
}

$string = "my friend name is utsav";
if(stringMatching($string)) {
    echo "match found";
}
else {
    echo "match not found";
}

?>