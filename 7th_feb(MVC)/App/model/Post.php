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
}

?>