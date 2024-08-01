<?php
namespace App\Controllers;

class Controller {
    
    public function index()
    {
        echo "hello index";
    }

    public function store() {
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

        // Process the data
        $username = $postData['name'] ?? '';

        echo $username;
    }

    public function report()
    {
        echo "hellp report";
    }
}