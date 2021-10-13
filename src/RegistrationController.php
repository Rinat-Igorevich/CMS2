<?php

namespace App;

use App\Model\User;
use App\View\View;

class RegistrationController
{
    public function register()
    {
        $user = User::create([
            'name' => 'Ринат',
            'email' => 'd1@12.ru',
            'password' => '111',

        ]);
//        return new View('rules', ['title' => 'Правила пользования сайтом']);
        echo("Test registration" );
    }

}