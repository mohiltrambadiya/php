<?php
require_once "preparedata.php";
$mysqli = new mysqli("localhost","root","","customer_portal");

if ($mysqli -> connect_errno) {     
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}

function insertData($tableName, $preparedData) {

    $mysqli = new mysqli("localhost","root","","customer_portal");

    $tableField = array_keys($preparedData);
    $field = implode(",", $tableField );

    $tableValue = array_values($preparedData);
    $value = "'".implode("','", $tableValue)."'";

    $sql = "INSERT INTO $tableName ($field) VALUES ($value)";
    if (mysqli_query($mysqli, $sql)) {
        echo "New record created successfully";
        $lastid = mysqli_insert_id($mysqli);
        return $lastid;
    }
    else {
        echo mysqli_error($mysqli);
    } 
}

function getfieldvalue($section, $fieldname) {
    $id = $_GET['id'];
    $mysqli = new mysqli("localhost","root","","customer_portal");
    switch ($section) {
        case 'account':
            $table = 'tbl_account';
            break;
        case 'address':
            $table = 'customer_address';
        break;
    }

    $sql = "SELECT $fieldname FROM $table WHERE ID='$id'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result); 
    return $row[$fieldname]; 

}

function fatchData() {
    $mysqli = new mysqli("localhost","root","","customer_portal");
    $sql = " SELECT 
                    A.ID, 
                    A.firstname, 
                    A.email, 
                    CA.city, 
                    CA.postalcode, 
                    HOBB.fieldvalue hobbies, 
                    GETIN.fieldvalue getintouch 
                    FROM tbl_account A 
                    LEFT JOIN customer_address CA ON A.ID = CA.ID 
                    LEFT JOIN customer_additional_info HOBB ON A.ID = HOBB.ID 
                    AND HOBB.fieldkey = 'hobbies' LEFT JOIN customer_additional_info GETIN 
                    ON A.ID = GETIN.ID AND GETIN.fieldkey = 'getintouch' ";


    $result = mysqli_query($mysqli, $sql); 
    $fatchedData = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          array_push($fatchedData, $row);
        }
    } else {
        echo mysqli_error($mysqli);
    }
    print_r($fatchedData[0]);
    return $fatchedData;

}


function getOther($section , $fieldname){
    $id = $_GET['id'];
    $mysqli = new mysqli("localhost","root","","customer_portal");
    $sql = "SELECT fieldvalue  FROM customer_additional_info
              WHERE fieldkey='$fieldname' AND ID = '$id'";
    $data = mysqli_query($mysqli , $sql);
    while ($row = mysqli_fetch_assoc($data)) {
            $demo = explode(',', $row['fieldvalue']);
            return $demo;
    }
}

function updateData($tableaName, $preparedData ) {
    $id = $_SESSION['id'];
    $mysqli = new mysqli("localhost","root","","customer_portal");

    foreach($preparedData as $field => $value) {
            $sql = "UPDATE $tableaName SET $field = '$value' WHERE id = '$id'";
            if (mysqli_query($mysqli, $sql)) {
            }
            else {
                echo mysqli_error($mysqli);
            }
    }
}

function updateOther($tableaName, $preparedData) {
    $id = $_SESSION['id'];
    $mysqli = new mysqli("localhost","root","","customer_portal");

    $temparray = [];
    foreach($preparedData as $key => $value ) {
        $temparray['fieldkey'] = $key;
        $temparray['fieldvalue'] = $value;
        $temparray['ID'] = $id;

        $sql = "UPDATE $tableaName SET fieldvalue = '$value' 
                WHERE  fieldkey = '$key' AND ID = '$id'";
        if (mysqli_query($mysqli, $sql)) {
        }
        else {
            echo mysqli_error($mysqli);
        }
    }

}

function deleteData($tableaName, $deleteID) {
    $mysqli = new mysqli("localhost","root","","customer_portal");
    $sql = "DELETE FROM $tableaName WHERE ID = '$deleteID'";

    if (mysqli_query($mysqli, $sql)) {
    }
    else {
        echo mysqli_error($mysqli);
    }
}

?>




   

    