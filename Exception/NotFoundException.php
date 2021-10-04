<?php

namespace App\Exception;

use App\View\Renderable;
use App\View\View;

class NotFoundException extends HttpException implements Renderable
{
    /**
     * @return View
     */
    public function render()
    {

        header('HTTP/1.0 404 Not Found', true,404 );

        $view = new View('errors.errors', ['errorText' => 'Ошибка 404. Страница не найдена']);
        $view->render();
    }
}