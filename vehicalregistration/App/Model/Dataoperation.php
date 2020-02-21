<?php

namespace App\Model;
use PDO;

class Dataoperation extends \Core\Model
{
    public static function Login($preparedData) {
        try {
            $db = static::getDB();
            $value = array_values($preparedData);
            $query = "SELECT userid, email, regpassword FROM user 
            WHERE email = '$value[0]' AND regpassword = '$value[1]' ";
            $stmt= $db->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result)) {
                $_SESSION['loginid'] = $result[0]['userid'];
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
                $query = "SELECT * FROM ($tableName) WHERE ($condition)";
                $stmt = $db->query($query);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }

    public static function insertData($tableName, $preparedData) {
        try {
            print_r($preparedData);
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
            $query = "INSERT INTO $tableName ($field) VALUES ($value)";
            $db->exec($query);
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

    public static function checkTimeSlot($preparedServiceData) {
        try {
            $date = $preparedServiceData['servicedate'];
            $db = static::getDB();
            $query = "SELECT timeslot FROM service_registration WHERE servicedate='$date'";
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