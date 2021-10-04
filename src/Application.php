<?php

namespace App;

use App\Exception\ApplicationException;
use App\Exception\HttpException;
use App\View\Renderable;
use App\View\View;
use Exception;

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

        $config = Config::getConfig();
        var_dump($config->get('db.mysql.host'));

        try {
            $dispatchedRoute = $this->router->dispatch($url, $method);

            if ($dispatchedRoute instanceof Renderable) {

                $dispatchedRoute->render();

            } else {

                echo $dispatchedRoute;
            }
        } catch (ApplicationException $e) {

            $this->renderException($e);
        }

    }

    private function renderException(ApplicationException $e)
    {
        if ($e instanceof Renderable) {

            $e->render();

        } elseif ($e instanceof HttpException) {

            http_response_code($e->getCode() == 0 ? 500 : $e->getCode());
            $view = new View('errors.errors', ['errorText'=>$e->getMessage()]);
            $view->render();

        }  else {

            $view = new View('errors.errors', ['errorText'=>$e->getMessage()]);
            $view->render();
        }
    }

}