<?php

namespace App;

use App\Helper\Common;
use App\Model\User;
use App\View\View;

class RegistrationController
{
    public function register()
    {
        $error = Common::validateRegistrationData();

        if ($error == null) {
            User::create([
                'name' => $_POST['newUserName'],
                'email' => $_POST['newUserEmail'],
                'password' => md5($_POST['newUserPassword']),
            ]);

            die (json_encode(['result' => 'регистрация прошла успешно']));
        } else {
            die (json_encode(['error' => $error]));
        }

    }

}