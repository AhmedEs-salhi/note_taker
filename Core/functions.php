<?php

use JetBrains\PhpStorm\NoReturn;

    #[NoReturn]
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

    function extractNameFromEmail($email) :string {
        $offset = strcspn($email, '@');
        return substr($email, 0, $offset);
    }

    function login($user) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name']
        ];
    }

    function logout() {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
