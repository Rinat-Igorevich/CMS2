<?php

namespace App;

class Application
{
    /*
     * Это основной класс приложения.
     * У него сейчас лишь одно свойство $router — объект класса маршрутизатора.
     */
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run(string $url, string $method)
    {
        /*
         * — этот метод выводит результат работы метода dispatch() маршрутизатора,
         *  передавая ему в качестве параметра URL-адрес текущей страницы и HTTP-метод запроса.
         */
        $this->router->dispatch($url, $method);

    }

}