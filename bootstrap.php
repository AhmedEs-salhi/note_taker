<?php

use Core\Database;
use Core\App;
use Core\Container;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require basePath('config.php');

    return new Database('ahmed', 'ahmedessalhi10', $config);
});

App::setContainer($container);