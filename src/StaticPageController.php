<?php

namespace App;

class StaticPageController
{
    public function test($param1, $param2)
    {
        return "Test Page With param1=$param1 param2=$param2";
    }
}