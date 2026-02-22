<?php

namespace Core;

use Core\Middleware\Middleware;
use Core\Middleware\Authenticator;
use Core\Middleware\Guest;
class Router {
    protected array $routes = [];

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }
    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }
    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }
    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }
    public function update($uri, $controller)
    {
        return $this->add($uri, $controller, 'UPDATE');
    }
    public function add($uri, $controller, $method)
    {
        $this->routes [] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }
    public function abort($statusCode = 404)
    {
        http_response_code($statusCode);
        require basePath("controllers/{$statusCode}.php");
        die();
    }

    function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route)
        {
            if ($route['uri'] === $uri && strtoupper($route['method']) === $method)
            {
                Middleware::resolve($route['middleware']);
                return require basePath($route['controller']);
            }
        }
        $this->abort();
    }
}