<?php

namespace App\Database;


class DBConnection
{


    private static $pdo;

    public static function make($config)
    {
        try {
          self::$pdo =   self::$pdo ?  :new \PDO("mysql" . ":host={$config['host']};dbname={$config['name']}", $config['user'], $config['password']);
          $sql = "CREATE TABLE IF NOT EXISTS tasks (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            description TEXT NOT NULL,
            completed BOOLEAN DEFAULT FALSE
        )";
         self::$pdo->exec($sql);
          return self::$pdo ;
        } catch (\PDOException $pDOException) {
            die($pDOException->getMessage());

        }
    }


}