<?php

namespace App;

class Router
{

    public array $routes;

    public function dispatch(string $url, string $method)
    {
        $method = strtolower($method);

        foreach ($this->routes as $route) {

            if ($route->match($url, $method)) {

                return $route->run();
            }
        }

        /*
         * этот метод ищет подходящий маршрут,
         * выполняет и возвращает его результат работы или возвращает ошибку,
         * если подходящего маршрута не найдено.
         */
    }

    private function addRoute(string $method, string $path, array $callback)
    {
        $routes[] = new Route($method, $path, $callback);
    }

    public function get(string $path, array $callback)
    {
        $this->addRoute('get', $path, $callback);
        var_dump($callback);
    }

    public function post(string $path, array $callback)
    {
        $this->addRoute('post', $path, $callback);
    }

}