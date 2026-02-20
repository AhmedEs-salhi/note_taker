<?php

    session_start();
    const BASE_PATH = __DIR__ . '/../';
    require BASE_PATH . 'Core/functions.php';

    $config = require basePath('config.php');

    spl_autoload_register(function ($class) {
        $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
        require basePath($class . '.php');
    });

    #require basePath("Core/Router.php");
    use Core\Router;

    $router = new Router();
    require basePath('routes.php');

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

    require basePath('bootstrap.php');
    $router->route($uri, $method);