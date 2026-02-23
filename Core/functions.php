<?php

    use Core\Session;
    function dumpAndDie($value) :void {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';

        die();
    }
    function urlIs($value) :bool {
        return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
    }

    #[NoReturn]
    function abort($http_status_code=404) :void {
        http_response_code($http_status_code);
        require basePath("controllers/{$http_status_code}.php");
        die();
    }

    function authorize($condition, $http_status_code=403) :void {
        if (!$condition)
            abort($http_status_code);
    }

    function basePath($path) :string {
        return BASE_PATH . $path;
    }

    function view($path, $attributes = []) :void {
        extract($attributes);
        require basePath('views/' . $path);
    }

    function redirect($path) :void {
        header("location: {$path}");
        die();
    }

    function old($key, $default = '') {
        return Session::get('old')[$key] ?? $default;
    }
