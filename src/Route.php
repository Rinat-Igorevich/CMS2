<?php

namespace App;

use App\View\Renderable;
use Closure;

class Route
{
    private string $path;
    private string $method;
    private $callback;

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
    public function __construct(string $method, string $path, $callback)
    {
        $this->path = $path;
        $this->method = $method;
        $this->callback = $this->prepareCallback($callback);
    }


    private function prepareCallback($callback)
    {
         if (!($callback instanceof Closure)) {
             list($class, $method) = explode('@', $callback);
             $object = new $class;
             $callback = [$object, $method];
        }

        return call_user_func_array($callback,[]);
        /*
         * это внутренний метод маршрутизатора.
         * Он преобразует параметр $callback в выполняемую функцию,
         * чтобы потом использовать её для выполнения маршрута.
         */

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
        //var_dump($this);
        return $this->callback;

//        if ($this->callback instanceof Renderable) {
//            $this->callback->render();
//
//        } else {
//            echo $this->callback;
//        }

        /*
         * этот метод запускает обработчик маршрута и возвращает результат его работы.
         */
    }

}