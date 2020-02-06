<?php

require_once 'prepareData.php';
require_once 'dataOperation.php';

function validation($fieldName, $fieldValue) {
    switch($fieldName) {
        case 'email':
            if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$fieldValue)) {
                return 0;
            }
            else{return 1;}
        break;
        case 'phoneno':
            if (!preg_match("/^[2-9]\d{2}\d{3}\d{4}$/",$fieldValue)) {
                return 0;
            }
            else{return 1;}
        break;
        default:
            return 1;
    }
}

function dataValidate($section) {
    $errorList = [];
    $valid = false;
    foreach($_POST[$section] as $key => $value) {
        if(!empty($value)) {
            if(validation($key, $value) == 0) { 
                echo "enter valid $key"."<br>";
                array_push($errorList, $key);
                $valid = false;
            break;
            }
            else {
                $valid = true;
            }
        }
        else {
            echo "fill the $key"."<br>";
            $valid = false;
        }
    }
}
if(isset($_POST['user'])) {
    
    $valid=dataValidate('user');
    echo $valid;
    if($valid == true) {
        $preparedUserData = getUserData('user');
        insertData('user', $preparedUserData);

    }
}

?>