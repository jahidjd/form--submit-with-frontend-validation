<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    public function getConnection() {
        $config = require __DIR__ . '/config.php';

        try {
            $conn = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']}",
                $config['username'],
                $config['password']
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}

$db = new Database();
