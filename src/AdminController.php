<?php

namespace App;

use App\View\View;

class AdminController
{
    public function index()
    {
        return new View('admin.admin', ['title' => 'Admin']);
    }

    public function users()
    {
        return new View('admin.users', ['title' => 'Admin']);
    }

}