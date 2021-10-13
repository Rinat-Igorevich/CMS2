<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role', 'accept_notification'];
    public $timestamps = false;
}