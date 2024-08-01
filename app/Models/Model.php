<?php
namespace App\Models;

require_once __DIR__ . '/../Config/Database.php';

use App\Config\Database;

class Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function store($data) {
        try {
            $sql = "INSERT INTO submissions (amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, hash_key, entry_at, entry_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute([$data['amount'], $data['buyer'], $data['receipt_id'], $data['items'], $data['buyer_email'], $data['buyer_ip'], $data['note'], $data['city'], $data['phone'], $data['hash_key'], $data['entry_at'], $data['entry_by']]);
            
            return "Data inserted successfully!";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
