<?php

define("APP_DIR", $_SERVER['DOCUMENT_ROOT']);
const VIEW_DIR = APP_DIR . '/view';

//require APP_DIR . '/src/Router.php';
//require APP_DIR . '/src/Application.php';
//require APP_DIR . '/src/Route.php';
//require APP_DIR . '/src/Controller.php';

spl_autoload_register(function ($class) {
     var_dump($class);
    //префикс пространства имен
    $prefix = 'App\\';

    //Базовый каталог для префикса пространства имен
    $base_dir = APP_DIR . '/src/';

    //использует ли класс префикс пространства имен?
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {

        //нет, переходим к следующему зарегистрированному автоподгрузчику
        return;
    }

    //получаем относительное имя класса
    $relative_class = substr($class, $len);


    //создаем имя файла
    $file = $base_dir . str_replace('\\' , '/', $relative_class) . '.php';


    //если файл существует, подключаем его
    if (file_exists($file)) {
        require $file;
    }

});