<?php

namespace App;

use App\View\View;

class StaticPageController
{
    public function test($param1, $param2)
    {
        return "Test Page With param1=$param1 param2=$param2";
    }

    public function show($param1)
    {
        return new View('posts.show', ['id' => $param1]);
        //return "Test Page With param1=$param1";
    }

    public function rules()
    {
        return new View('rules', ['title' => 'Правила пользования сайтом']);
        //return "Test Page With param1=$param1";
    }
}