<?php

namespace App;

class CRUD
{
    // private $conn;
    private $useDb;
    
    public function __construct()
    {
        // $this->conn = \App\Db::getInstance();
        $this->useDb = new \App\UseDb();
    }

    public function create(string $table, array $data): bool {
       $columns =  implode(', ', array_keys($data));
       $values = ':' . implode(', :', array_keys($data));
       $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

    //    $stmt = $this->conn->prepare($sql);
    //    return $stmt->execute($data);
        $stmt = $this->useDb->query($sql, $data);
        if (!$stmt) {
            return false;
        }

        return true;
    }

    public function read(string $table, null|string $where = null, null|string $orderBy = null, null|string $limit = null, string $columns = '*'): false|array {
        $sql = "SELECT {$columns} FROM {$table}";
        if ($where) {
            $sql .= " WHERE {$where}";
        }
        if ($orderBy) {
            $sql .= " ORDER BY {$orderBy}";
        }
        if ($limit) {
            $sql .= " LIMIT {$limit}";
        }

        // $stmt = $this->conn->prepare($sql);
        // $stmt->execute();
        $stmt = $this->useDb->query($sql);
        if (!$stmt) {
            return false;
        }
        return $stmt->findAll();

    }

    public function update(string $table, array $data, string $where): bool {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "{$key} = :{$key}, ";
        }

        $set = rtrim($set, ', ');
        $sql = "UPDATE {$table} SET {$set} WHERE {$where}";
        // $stmt = $this->conn->prepare($sql);
        // foreach ($data as $key => $value) {
        //     $stmt->bindValue(':'.$key, $value);
        // }
        // return $stmt->execute($data);

        $stmt = $this->useDb->query($sql, $data);
        if ($stmt == false) {
            return false;
        }
        return true;
    }

    public function delete(string $table, string $where): bool {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        // $stmt = $this->conn->prepare($sql);
        // return $stmt->execute();

        $stmt = $this->useDb->query($sql);
        if ($stmt == false) {
            return false;
        }

        return true;
    }

    public function __destruct() {
        $this->useDb = null; 
    }

}
