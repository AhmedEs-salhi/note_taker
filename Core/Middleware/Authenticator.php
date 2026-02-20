<?php

namespace Core\Middleware;

class Authenticator
{
    function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}