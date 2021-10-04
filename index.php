<?php

use App\Application;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

$router = new Router();

//$router->get('/', function() {
//    return 'home';
//});
//$router->get('/about', function() {
//    return 'about';
//});
$router->get('/about', \App\Controller::class . '@about');
$router->get('/',\App\Controller::class . '@index');

$application = new Application($router);


$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
