<?php

$mysqli = new mysqli("localhost","root","","database_practice");

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }
if(isset($_POST['submit'])) {

    $sql = "INSERT INTO PERSON VALUES 
           ('','".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["phoneno"]."') ";

    if (mysqli_query($mysqli, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($mysqli);
    }
}

if(isset($_POST['select'])) {
  
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    $sql = 'SELECT * FROM PERSON WHERE ID = ' .$id;
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "ID " . $row["ID"]. "<br>";
           echo "frist name: " . $row["firstname"]. "<br>";
           echo "last name: " . $row["lastname"]. "<br>";
           echo "phone no: " . $row["phoneno"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}

if(isset($_POST['update'])) {

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        echo $id; 
    }
    $query = "UPDATE PERSON SET firstname = "."'".$_POST["firstname"]."',lastname =
     '".$_POST["lastname"]."', phoneno = '".$_POST["phoneno"]."' WHERE  ID = ".$id;

     echo $query;

    if (mysqli_query($mysqli, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }
}

?>