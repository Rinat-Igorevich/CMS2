<?php

session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use App\AdminController;
use App\Application;
use App\Controller;
use App\LoginController;
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
$router->get('/login', Controller::class . '@login');
$router->get('/profile', Controller::class . '@profile');
$router->get('/registration', Controller::class . '@registration');

$router->post('/authorization/register', RegistrationController::class . '@register');
$router->post('/login', LoginController::class . '@login');
$router->get('/logout', LoginController::class . '@logout');
$router->get('/admin', AdminController::class . '@index');
$router->get('/admin/users', AdminController::class . '@users');

//var_dump($router);

$application = new Application($router);


$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
