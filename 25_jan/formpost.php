<?php
echo "<pre>";
// print_r($_POST);
echo "</pre>";
session_start();

function getfieldvalue($section, $fieldname) {
    return (isset($_SESSION[$section][$fieldname]) ? $_SESSION[$section][$fieldname] : "" );
}

function setsessionvalue($section) {
    isset($_POST[$section]) ? $_SESSION[$section] = $_POST[$section] : [];
}

function getsessionvalue($section) {
    return (isset($_SESSION[$section]) ? $_SESSION[$section] : []);
}

 //if(isset($_POST['account']) &&  $_POST['address'] && $_POST['other'] && isset($_POST['submit'])) {
   //  setsessionvalue('account');
     //setsessionvalue('address');
    //setsessionvalue('other');
 //}

function validation($fieldname, $fieldvalue) {
    switch($fieldname) {
        case 'firstname':
            if (!preg_match("/^[a-zA-Z]/",$fieldvalue)) {
                return 0;
            }
            else { return 1;}
        break;
        case 'lastname':
            if (!preg_match("/^[a-zA-Z]/",$fieldvalue)) {
                return 0;
            }
            else { return 1;}
        break;
        case 'email':
            if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$fieldvalue)) {
                return 0;
            }
            else{return 1;}
        break;
        case 'phoneno':
            if (!preg_match("/^[2-9]\d{2}\d{3}\d{4}$/",$fieldvalue)) {
                return 0;
            }
            else{return 1;}
        break;

        default:
            return 1;
    }
}

function sectionValidation($section) {
    $errorList = [];
    foreach($_POST[$section] as $key => $value) {
        if(!empty($value)) {
            if(validation($key, $value) == 0) {
                echo "enter valid $key";
                array_push($errorList, $key);
            }
        }
        else {
            echo "fill the $key";
        }
    }
    if($errorList != null) {
        setsessionvalue($section);
    }
}
echo "<pre>";
//print_r($_SESSION["account"]);
//print_r($_SESSION["address"]);
//print_r($_SESSION["other"]);
echo "</pre>";

if(isset($_POST['submit'])) {
    sectionValidation("account");
    sectionValidation("address");
    sectionValidation("other");
}

?>