<?php
namespace App\Models;

require_once __DIR__ . '/../Config/Database.php';

use App\Config\Database;
use PDO;
use PDOException;

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
            echo "Error: " . $e->getMessage();
        }
    }

    public function getSubmissionsRepost(string $startDate = null, string $endDate = null, $userId = null) {
        try {
            $query = "SELECT * FROM submissions WHERE 1=1";
    
            if ($startDate != null) {
                $query .= " AND entry_at >= :startDate";
            }
            if ($endDate != null) {
                $query .= " AND entry_at <= :endDate";
            }
            if ($userId != null) {
                $query .= " AND entry_by =" . $userId;
            }
    
            $stmt = $this->db->prepare($query);
            if ($startDate != null) {
                $stmt->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            }
            if ($endDate != null) {
                $stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);
            }
            $stmt->execute();
        
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) { 
            echo "Error: " . $e->getMessage();
        }
    }    
}
