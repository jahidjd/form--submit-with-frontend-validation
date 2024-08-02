<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {

    private $conn;

    public function getConnection() {
        $config = require __DIR__ . '/config.php';
        try {
            $this->conn = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']}",
                $config['username'],
                $config['password']
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function prepare($sql) 
    {
        $conn = $this->getConnection();
        
        return $conn->prepare($sql);
    }
}

$db = new Database();
