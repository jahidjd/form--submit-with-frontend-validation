<?php
namespace App\Controllers;

class ViewController {

    public function index()
    {
        echo file_get_contents('View/form_submit.html');
    }
}