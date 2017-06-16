<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 15.03.17
 * Time: 17:55
 */
use xbuw\framework\Application;

$loader = require '../vendor/autoload.php';
$loader->addPsr4("Shop\\", dirname(__FILE__).'/../src/');
$config = parse_ini_file(dirname(__FILE__) . "/../config/routes.ini", true);
$page = new Application($config);
$page->run();
