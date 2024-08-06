<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Model.php';

use App\Models\Model;

class Controller {

    private $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function store() 
    {
        try {
            $contentType = $_SERVER["CONTENT_TYPE"] ?? '';
            $postData = [];
    
            if (strpos($contentType, 'application/json') !== false) {
                // Handle JSON data
                $input = file_get_contents('php://input');
                $postData = json_decode($input, true);
            } elseif (strpos($contentType, 'application/x-www-form-urlencoded') !== false 
                        || strpos($contentType, 'multipart/form-data') !== false) {
                // Handle form data
                $postData = $_POST;
            }
            
            if(isset($_COOKIE[$postData['entry_by']]) && $_COOKIE[$postData['entry_by']] == $postData['entry_by']){ 

                echo json_encode([
                    'status' => 'cookie',
                    'message' => 'You can only submit once every 24 hours.'
                ]);
                exit;
            }
            // Fetch form data
            $data['amount'] = intval($postData['amount']);
            $data['buyer'] = filter_var($postData['buyer'], FILTER_SANITIZE_STRING);
            $data['receipt_id'] = filter_var($postData['receipt_id'], FILTER_SANITIZE_STRING);
            $data['items']  = filter_var($postData['items'], FILTER_SANITIZE_STRING);
            $data['buyer_email']  = filter_var($postData['buyer_email'], FILTER_VALIDATE_EMAIL);
            $data['note']  = filter_var($postData['note'], FILTER_SANITIZE_STRING);
            $data['city'] = filter_var($postData['city'], FILTER_SANITIZE_STRING);
            $data['phone'] = filter_var($postData['phone'], FILTER_SANITIZE_STRING);
            $data['entry_by']  = intval($postData['entry_by']);
            $data['buyer_ip']  = $_SERVER['REMOTE_ADDR'];
            $data['entry_at']  = date("Y-m-d");

            // Generate salt and hash key using sha-512
            $salt = bin2hex(random_bytes(16));
            $data['hash_key'] = hash('sha512', $postData['receipt_id'] . $salt);
          
            $this->model->store($data);
            $this->preventMultipleSubmissions($postData['entry_by']);
            
           
            echo \json_encode([
                'status' => 'true',
                'message' => 'data inserted successfully'
            ]);
            exit();
                    
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

    }

    public function report()
    {
         include 'View\report.php';
    }

    public function getReport()
    {
        $startDate = $_POST['start_date'] ?? null;
        $endDate = $_POST['end_date'] ?? null;
        $userId = $_POST['user_id'] ?? null;

        if ($startDate || $endDate || $userId) {
            $submissions = $this->model->getSubmissionsRepost($startDate, $endDate, $userId);
        } else {
            $submissions = [];
        }
        include 'View\report.php';
    }

    function preventMultipleSubmissions($userId) {
        $cookieName = $userId;
        $cookieValue = $userId; 
        $cookieExpire = time() + (24 * 60 * 60); // Expire in 24 hours
        setcookie($cookieName, $cookieValue, $cookieExpire, '/');

        return true;

    }
}