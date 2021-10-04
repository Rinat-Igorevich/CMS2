<?php

namespace App;

use App\View\View;

class Controller
{
    public function index()
    {
        return new View('homepage', ['title' => 'Главная страница']);
    }

    public function about()
    {
        return new View('about', ['title' => 'О нас']);
    }


}