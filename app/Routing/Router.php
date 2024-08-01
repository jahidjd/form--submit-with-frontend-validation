<?php
namespace App\Routing;

include "App\Controllers\Controller.php";
include "App\Controllers\ViewController.php";

class Router {
    public $routes = [];

    public function get($uri, string $controllerClass, string $method)
    {
        $this->routes[] = [
            'method' => 'GET',
            'uri' => $uri,
            'controllerClass' => $controllerClass,
            'fun' => $method
        ];
    }

    public function post($uri, string $controllerClass, string $method)
    {
        $this->routes[] = [
            'method' => 'POST',
            'uri' => $uri,
            'controllerClass' => $controllerClass,
            'fun' => $method
        ];
    }

    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $base_url = "/form-submit-with-frontend-validation";

        foreach ($this->routes as $route){
            if ($base_url . $route['uri'] == $uri && $route['method'] == $method){
                $controller = new $route['controllerClass']();
                $controller->{$route['fun']}();
                return;
            }
        }

        echo "Not Found";
    }
}

$router = new Router();