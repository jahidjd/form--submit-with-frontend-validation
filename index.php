<?php
include "App\Routing\Router.php";

if (str_contains($_SERVER['REQUEST_URI'], '/form-submit-with-frontend-validation')){
    $uri_segment = explode('/form-submit-with-frontend-validation/', $_SERVER['REQUEST_URI'])[1] ?? '';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    switch($uri_segment){
        case '':
              $router->get('/',App\Controllers\ViewController::class,'index');
            break;
        case 'report':
            $router->get('/report',App\Controllers\Controller::class,'report');
            break;
        case 'store':
            $router->post('/store',App\Controllers\Controller::class,'store');
            break;
    }
}

$router->run();