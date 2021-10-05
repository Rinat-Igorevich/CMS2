<?php

use App\Application;
use App\Controller;
use App\Router;
use App\StaticPageController;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

$router = new Router();

$router->get('/', Controller::class . '@index');
$router->get('/about', Controller::class . '@about');
$router->get('/posts', Controller::class . '@posts');
$router->get('/test/*/test2/*', StaticPageController::class.'@test');

$application = new Application($router);


$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
