<?php

abstract class Model
{
    abstract static function get_table_name();

    public static function findAll()
    {
        try {
            global $db;
            $table_name = static::get_table_name();
            $sth = $db->prepare("SELECT * FROM {$table_name}");
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public static function findById($id)
    {
        try {
            global $db;
            $sql = 'SELECT * FROM pages WHERE id = :id';
            $stmt = $db->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public  function insert($title, $content)
    {
        try {
            global $db;
            $table_name = static::get_table_name();
            $sql = "INSERT INTO {$table_name} (title, content) VALUES (?,?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([$title, $content,]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
}
