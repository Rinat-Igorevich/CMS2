<?php

namespace App\Exception;

use App\View\Renderable;

class NotFoundException extends HttpException implements Renderable
{

    public function render()
    {
        header('HTTP/1.0 404 Not Found', true,404 );
    }
}