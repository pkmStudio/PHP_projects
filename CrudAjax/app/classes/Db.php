<?php

namespace App;

use PDO;
use PDOException;

class Db
{
    private static $pdo = null;
    private static $dsn;
    private static $opt;
    private static $user = 'root';
    private static $password = '';
    private static $db = 'world';
    private static $host = 'MySQL-8.0';
    private static $charset = 'utf8mb4';
    public static function getInstance()
    {
        try {
            if (self::$pdo == null) {
                self::$dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$db . ';charset=' . self::$charset;
                self::$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
                self::$pdo = new PDO(
                    self::$dsn,
                    self::$user,
                    self::$password,
                    self::$opt
                );
            }
        } catch (PDOException $error) {
            die('Error connect to database: ' . $error->getMessage());
        }

        return self::$pdo;
    }
}
