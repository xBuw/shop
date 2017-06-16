<?php

use xbuw\framework\Application;

//debug
ini_set('display_errors', 'On');
error_reporting(E_STRICT);

$loader = require '../vendor/autoload.php';
$loader->addPsr4("Shop\\", dirname(__FILE__).'/../src/');

$routes = parse_ini_file(dirname(__FILE__) . "/../config/routes.ini", true);
$middleware = require dirname(__FILE__)."/../config/middleware.php";
$routeMiddleware = require dirname(__FILE__) . "/../config/routeMiddleware.php";

$page = new Application($routes, $middleware, $routeMiddleware);
$page->run();
