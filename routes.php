<?php

    $router->get('/', 'controllers/index.php');
    $router->get('/index', 'controllers/index.php');
    #$router->get('/register', 'controllers/register.php');
    $router->get('/note', 'controllers/note/detail.php');
    $router->get('/notes', 'controllers/note/display.php')->only('auth');
    $router->get('/note/create', 'controllers/note/create.php');
    $router->post('/notes', 'controllers/note/store.php');
    $router->delete('/note', 'controllers/note/destroy.php');
    $router->get('/note/edit', 'controllers/note/edit.php');
    $router->patch('/note', 'controllers/note/update.php');
    $router->get('/register', 'controllers/register/create.php')->only('guest');
    $router->post('/register', 'controllers/register/store.php');
    $router->get('/login', 'controllers/session/create.php')->only('guest');
    $router->post('/session', 'controllers/session/store.php')->only('guest');
    $router->delete('/session', 'controllers/session/destroy.php')->only('auth');