<?php
$string = "my hobby is playing cricket";
if(preg_("/playing/", $string)) {
    echo "match found";
}
else  {
    echo "match not found";
}
?>