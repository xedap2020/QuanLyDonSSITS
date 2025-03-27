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

        // 1. Route tĩnh
        if (isset($this->routes[$method][$uri])) {
            list($controller, $methodName) = explode('@', $this->routes[$method][$uri]);
            return (new $controller)->$methodName();
        }

        // 2. Route động: /users/edit/2
        foreach ($this->routes[$method] as $route => $action) {
            $pattern = preg_replace('/\{[^\/]+\}/', '([^\/]+)', $route);
            $pattern = "#^$pattern$#";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                list($controller, $methodName) = explode('@', $action);
                return (new $controller)->$methodName(...$matches);
            }
        }

        // 3. Nếu có query string (vd: users/edit?id=2)
        $uriWithoutQuery = explode('?', $uri)[0];
        if (isset($this->routes[$method][$uriWithoutQuery])) {
            list($controller, $methodName) = explode('@', $this->routes[$method][$uriWithoutQuery]);
            parse_str($_SERVER['QUERY_STRING'], $params);
            return (new $controller)->$methodName(...array_values($params));
        }

        // 4. Không khớp route nào
        http_response_code(404);
        echo "404 Not Found";
        exit;
    }
}
