<?php

require_once 'prepareData.php';
require_once 'validation.php';

$conn = new mysqli('localhost', 'root', "", 'blog_portal');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function insertData($tableName, $preparedData) {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');

    $field = array_keys($preparedData);
    $tableField = implode(",", $field);

    $value = array_values($preparedData);
    $tableValue = "'".implode("','", $value)."'";

    $query = "INSERT INTO $tableName($tableField) VALUES ($tableValue)";
    if (mysqli_query($conn, $query)) {
        $lastid = mysqli_insert_id($conn);
        return $lastid;
     } else {
        echo  mysqli_error($conn);
     }
}

function login($preparedData) {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');

    $value = array_values($preparedData);

    $query = "SELECT email, regpassword FROM user 
    WHERE email = '$value[0]' AND regpassword = '$value[1]' ";

    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);
    if($row > 0 ) {
        header('Location:blogCategory.php');
        echo "login succesfully";
        $_SESSION['email'] = $value[0];
    }
    else {
        echo "invalid email or password";
    }
} 

function getParentCategory() {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');
    $query = "SELECT * FROM parentcategory";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result); 
    return $row;
    print_r($row);
}

function fatchCategory() {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');
    $query = "SELECT categoryid,title,createdat FROM category";
    $result = mysqli_query($conn, $query); 
    $fatchedData = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          array_push($fatchedData, $row);
        }
    } else {
        echo mysqli_error($conn);
    }
    return $fatchedData;
}

function deleteData($tableName, $deleteID, $fieldName) {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');
    $query = "DELETE FROM $tableName WHERE $fieldName ='$deleteID' ";
    if (mysqli_query($conn, $query)) {
    }
    else {
        echo mysqli_error($conn);
    }
}

function getData($section, $fieldName) {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');
    $id = $_SESSION['updateid'];
    switch($section) {
        case'category':
            $tableName = 'category';
            $ID = 'categoryid';
        break;
        case'mark':
            $tableName = 'tbl_mark';
        break;
    }
    $query = "SELECT $fieldName FROM $tableName WHERE $ID='$id' ";
    echo $query;
    $result = mysqli_query($conn, $query);
    if($fieldName != 'hobbies') {
        $row = mysqli_fetch_assoc($result); 
        return $row[$fieldName];
    }
    else {
        $row = mysqli_fetch_assoc($result); 
        $demo = explode("_",$row[$fieldName]);
        return $demo;
    }
}

function updateData($tableName, $preparedData) {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');
    $id = $_SESSION['updateid'];
    switch($tableName) {
        case 'category':
            $ID = 'categoryid';
        break;
    }
    foreach($preparedData as $field => $value) {
        $query = "UPDATE $tableName SET $field = '$value' WHERE $ID = '$id'";
        if (mysqli_query($conn, $query)) {
        }
        else {
            echo mysqli_error($conn);
        }
    }
}

?>