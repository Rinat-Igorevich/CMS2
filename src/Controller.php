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

    public function posts()
    {
        return new View('posts.posts', ['title' => 'Posts']);
    }

    public function authorization()
    {
        return new View('authorization.authorization', ['title' => 'authorization']);
    }

    public function registration()
    {
        return new View('authorization.registration', ['title' => 'registration']);
    }
    public function profile()
    {
        return new View('profile.profile', ['title' => 'profile']);
    }


}