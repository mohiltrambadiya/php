<?php
$string = "my hobby is playing cricket";
if(preg_match("/playing/", $string)) {
    echo "match found";
}
else  {
    echo "match not found";
}
?>