<?php
error_reporting(-1);

use vendor\core\Router;

require_once '../vendor/libs/functions.php';
debug($_GET);

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app');

spl_autoload_register(function ($class) {
    //debug($class);
    $file = ROOT . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    //debug($file);
    if (is_file($file)) {
        require_once $file;
    }
});

$query = trim($_SERVER['REQUEST_URI'], '/');

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// defaults roots
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)\/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());

Router::dispatch($query);