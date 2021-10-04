<?php

namespace App;

use Closure;

class Route
{
    private string $path;
    private string $method;
    private Closure $callback;

    /*
     * Этот класс представляет собой экземпляр маршрута.
     * Его задача — хранить в себе параметры маршрута и
     * уметь запускать код-обработчик выполнения текущего маршрута
     * (выполнять контроллер, указанный в callback-функции)
     */
    /**
     * @param string $path
     * @param string $method
     * @param array $callback
     */
    public function __construct(string $path, string $method, array $callback)
    {
        $this->path = $path;
        $this->method = $method;
        $this->callback = $this->prepareCallback($callback);
    }


    private function prepareCallback(array $callback): Closure
    {
        var_dump($callback[0]);
        /*
         * это внутренний метод маршрутизатора.
         * Он преобразует параметр $callback в выполняемую функцию,
         * чтобы потом использовать её для выполнения маршрута.
         */
        return $callback[0]();
    }

    public function getPath(): string
    {
        /*
         * это метод-геттер. Он просто возвращает текущее значение свойства $path.
         */
        return $this->path;
    }

    public function match(string $uri, string $method): bool
    {
        /*
         * этот метод проверяет, подходит ли текущий маршрут текущему запросу.
         */
        return $this->getPath() == $uri && $this->method == $method;
    }

    public function run()
    {
        $this->prepareCallback();
        /*
         * этот метод запускает обработчик маршрута и возвращает результат его работы.
         */
    }

}