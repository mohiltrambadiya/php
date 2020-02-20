<?php

namespace App\Model;
use PDO;

class Dataoperation extends \Core\Model
{
    public static function Login($preparedData) {
        try {
            $db = static::getDB();
            $value = array_values($preparedData);
            $query = "SELECT id, email, regpassword FROM register 
            WHERE email = '$value[0]' AND regpassword = '$value[1]' ";
            $stmt= $db->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result)) {
                $_SESSION['id'] = $result[0]['id'];
            }
            else {
                echo 'invalid email or password';
            }
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }
    public static function getAllData($tableName, $condition = '') {
        try {
            $db = static::getDB();
            if(func_num_args() == 1) {
                $stmt = $db->query("SELECT * FROM ($tableName)");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            else {
                $stmt = $db->query("SELECT * FROM ($tableName) WHERE ($condition)");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }

    public static function insertCategory($tableName, $preparedData) {
        try {
            $db = static::getDB();
            $tableField = array_keys($preparedData);
            $field = implode(",", $tableField );

            foreach(array_values($preparedData) as $value) {
                if($value != 'NULL') {
                    $tableValue[] = "'" . $value . "'";
                }
                else {
                    $tableValue[] = $value;
                }
            }
            $value = implode(",", $tableValue);
            $db->exec("INSERT INTO $tableName ($field) VALUES ($value)");
            return $db->lastInsertId();
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }

    public static function UpdateData($id, $tableName, $preparedData, $fieldName) {
        try {
            $db = static::getDB();
            $updatearg = [];
            foreach($preparedData as $key => $value) {
                if($key == 'parentcategoryid') {
                    $updatearg[] = "$key = $value";
                }
                else {
                    $updatearg[] = "$key = '$value'";   
                }
            }
            $sql = "UPDATE $tableName SET " . implode(', ',$updatearg) . "WHERE ($fieldName)='$id'";
            $result = $db->exec($sql);
            return $result;
        }
        catch (PDOExcetion   $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteData($id, $tableName, $fieldName) {
        try {
            $db = static::getDB();
            $sql = "DELETE FROM $tableName WHERE ($fieldName) = '$id'";
            $result = $db->exec($sql);
            return $result;
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }

    public static function queryData($query) {
        try{
            $db = static::getDB();
            $stmt = $db->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }
}
?>