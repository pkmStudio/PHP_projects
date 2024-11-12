<?php

namespace App;

use PDOException;

class UseDb
{
    private ?\PDO $conn;
    private $stmt;

    public function __construct()
    {
        $this->conn = \App\Db::getInstance();
    }

    public function query(string $sql, array $data = []): false|\App\UseDb {
        $this->stmt = $this->conn->prepare($sql);
        try {
            $this->stmt->execute($data);
        } catch (PDOException $error) {
            return false;
        }

        return $this;
    }

    public function findRow() {
        return $this->stmt->fetch();
    }

    public function findAll() {
        return $this->stmt->fetchAll();
    }

    public function findColumn() {
        return $this->stmt->fetchColumn();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
