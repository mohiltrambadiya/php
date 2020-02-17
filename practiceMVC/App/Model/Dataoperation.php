<?php

namespace App\Model;
use PDO;

class Dataoperation extends \Core\Model
{
    public static function getAllData($tableName, $condition = '') {
        try {
            $db = static::getDB();
            if(func_num_args() == 1) {
                $stmt = $db->query("SELECT * FROM ($tableName)");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            else {
                $a ="SELECT * FROM ($tableName) WHERE ($condition)";
                echo $a;
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
                $updatearg[] = "$key = '$value'";
            }
            $sql = "UPDATE $tableName SET " . implode(', ',$updatearg) . "WHERE ($fieldName)='$id'";
            echo $sql;
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