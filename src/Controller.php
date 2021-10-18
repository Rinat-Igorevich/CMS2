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

    public function login()
    {
        return new View('authorization.login', ['title' => 'login']);
    }

    public function registration()
    {
        return new View('authorization.registration', ['title' => 'registration']);
    }
    public function profile()
    {
        if (!isset($_SESSION['isAuth']) || $_SESSION['isAuth'] == false) {
            header('Location: /login/');
            exit;
        } else {
            return new View('profile.profile', ['title' => 'Личный кабинет']);
        }
    }


}