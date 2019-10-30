<?php
require_once '../vendor/libs/functions.php';
require_once '../vendor/core/Router.php';

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');

spl_autoload_register(function ($class) {
    $file = APP . "/controllers/$class.php";
    if (is_file($file)) {
        require_once $file;
    }
});

$query = trim($_SERVER['REQUEST_URI'], '/');

//Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Posts']);

// defaults roots
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)\/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());

Router::dispatch($query);