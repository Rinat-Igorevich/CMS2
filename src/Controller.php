<?php

namespace App;

use App\View\View;

class Controller
{
    public function index()
    {
        return new View('homepage', ['title' => 'Index Page']);
    }

}