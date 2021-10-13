<?php

namespace App\Helper;

use App\Model\User;

class Common
{
    public static function isUserExist($email)
    {
            return User::where('email', $email)->exists();

    }

    public static function validateRegistrationData() {

      return self::isUserExist($_POST['newUserEmail']) ? 'Пользователь с таким email уже зарегистрирован' : null;

    }

}
