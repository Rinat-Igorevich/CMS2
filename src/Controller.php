<?php

namespace App;

use App\View\View;

class Controller
{
    public function index()
    {
        return new View('personal.messages.show', ['title' => 'Index Page']);
    }

}