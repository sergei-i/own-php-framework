<?php
require_once '../vendor/libs/functions.php';
require_once '../vendor/core/Router.php';

$query = rtrim($_SERVER['REQUEST_URI'], '/');

Router::add('/posts/add', ['controller' => 'Posts', 'action' => 'add']);
Router::add('/posts', ['controller' => 'Main', 'action' => 'index']);

//debug(Router::getRoutes());

if (Router::matchRoute($query)) {
    debug(Router::getRoute());
} else {
    echo '404';
}