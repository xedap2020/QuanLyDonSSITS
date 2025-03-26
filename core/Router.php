<?php
class Router {
    private $routes = ['GET' => [], 'POST' => []];

    public function get($uri, $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action) {
        $this->routes['POST'][$uri] = $action;
    }

    public function direct($uri) {
        $method = $_SERVER['REQUEST_METHOD'];
        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            exit;
        }

        list($controller, $method) = explode('@', $this->routes[$method][$uri]);
        (new $controller)->$method();
    }
}
