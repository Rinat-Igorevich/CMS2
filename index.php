<?php

use App\Application;
use App\Controller;
use App\RegistrationController;
use App\Router;
use App\StaticPageController;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

$router = new Router();

$router->get('/', Controller::class . '@index');
$router->get('/about', Controller::class . '@about');
$router->get('/posts', Controller::class . '@posts');
$router->get('/posts/*/test2/*', StaticPageController::class.'@test');
$router->get('/posts/*', StaticPageController::class.'@show');
$router->get('/rules', StaticPageController::class.'@rules');
$router->get('/authorization', Controller::class . '@authorization');
$router->get('/profile', Controller::class . '@profile');
$router->get('/registration', Controller::class . '@registration');

$router->post('/authorization/register', RegistrationController::class . '@register');

//var_dump($router);

$application = new Application($router);


$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
