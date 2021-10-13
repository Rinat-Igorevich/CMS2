<?php

namespace App;

use App\Exception\ApplicationException;
use App\Exception\HttpException;
use App\Model\User;
use App\View\Renderable;
use App\View\View;
use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;

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
        $this->initialize();
    }

    private function initialize()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost:3307',
            'database' => 'cms',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

    }

    public function run(string $url, string $method)
    {
        /*
         * — этот метод выводит результат работы метода dispatch() маршрутизатора,
         *  передавая ему в качестве параметра URL-адрес текущей страницы и HTTP-метод запроса.
         */

        $config = Config::getConfig();
//        var_dump($config->get('db.mysql.host'));
//        var_dump(User::where('email', 'agrispo33@gmail.com')->exists());




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