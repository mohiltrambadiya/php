<?php

namespace App\model;
use PDO;

class Post extends \core\Model
{
    public static function getAll() {   

        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT id, title, content FROM postdata');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }

    public static function insertPost($tableName, $preparedData) {
        try {
            $db = static::getDB();
            $tableField = array_keys($preparedData);
            $field = implode(",", $tableField );

            $tableValue = array_values($preparedData);
            $value = "'".implode("','", $tableValue)."'";

            $result = $db->exec("INSERT INTO $tableName ($field) VALUES ($value)");
            return $result;
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }

    public static function fatchData($id) {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT id, title, content FROM postdata WHERE id='$id'");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }

    public static function UpdatePost($id, $tableName, $preparedData) {
        try {
            $db = static::getDB();
            $updatearg = [];
            foreach($preparedData as $key => $value) {
                $updatearg[] = "$key = '$value'";
            }
            $sql = "UPDATE $tableName SET " . implode(', ',$updatearg) . "WHERE id='$id'";
            $result = $db->exec($sql);
            return $result;
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }

    public static function deletePostData($id, $tableName) {
        try {
            $db = static::getDB();
            $sql = "DELETE FROM $tableName WHERE id = '$id'";
            $result = $db->exec($sql);
            return $result;
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }
}

?>