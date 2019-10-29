<?php
require_once '../vendor/libs/functions.php';
require_once '../vendor/core/Router.php';

$query = rtrim($_SERVER['REQUEST_URI'], '/');

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)\/?(?P<action>[a-z-]+)?$');

debug(Router::getRoutes());
Router::matchRoute($query);
//Router::dispatch($query);