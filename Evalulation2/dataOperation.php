<?php
require_once 'prepareData.php';
require_once 'validation.php';
if(isset($_GET['updateid'])) {
    $_SESSION['updateid'] = $_GET['updateid'];
}
if(isset($_GET['updateblogid'])) {
    $_SESSION['updateblogid'] = $_GET['updateblogid'];
}
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
    print_r($value);

    echo $query = "SELECT userid,email, regpassword FROM user 
    WHERE email = '$value[0]' AND regpassword = '$value[1]' ";

    $result = mysqli_query($conn, $query);
    $temp = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($temp > 0 ) {
        var_dump($row);
        $_SESSION['userid'] = $row['userid'];
        header('Location: blogView.php');
    }
    else {
        echo "invalid email or password";
    }
} 

function getParentCategory() {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');
    $query = "SELECT * FROM parentcategory";
    $result = mysqli_query($conn, $query); 
    return $result;
}

function getCategory() {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');
    $query = "SELECT title FROM category";
    $result = mysqli_query($conn, $query); 
    return $result;
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

function fatchBlog() {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');
    $id = $_SESSION['userid'];
    $query = "SELECT postid,category,title,publishat FROM post WHERE postid='$id'";
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
    $id = $_SESSION['userid'];
    switch($section) {
        case'category':
            $tableName = 'category';
            $ID = 'categoryid';
            $id = $_SESSION['updateid'];
        break;
        case'user':
            $tableName = 'user';
            $ID = 'userid';
        break;
        case 'blog':
            $tableName = 'post';
            $ID = 'postid';
            $id = $_SESSION['updateblogid'];
        break;
    }
    if($fieldName == 'password') {
        $fieldName = 'regpassword';
    }
    $query = "SELECT ($fieldName) FROM ($tableName) WHERE $ID= '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result); 
    return $row[$fieldName];
    
}

function updateData($tableName, $preparedData) {
    $conn = new mysqli('localhost', 'root', "", 'blog_portal');
    switch($tableName) {
        case 'category':
            $ID = 'categoryid';
            $id = $_SESSION['updateid'];
        break;
        case 'user':
            $ID = 'userid';
            $id = $_SESSION['userid'];
        break;
        case 'post':
            $ID = 'postid';
            $id = $_SESSION['updateblogid'];
        break;
    }
    foreach($preparedData as $field => $value) {
        $query = "UPDATE $tableName SET $field = '$value'WHERE $ID = '$id'";
        if (mysqli_query($conn, $query)) {
        }
        else {
            echo mysqli_error($conn);
        }
    }
}

?>  