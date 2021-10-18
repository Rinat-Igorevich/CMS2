<?php

namespace App;

use App\Model\User;

class LoginController
{
    public function login()
    {
        if (User::where('email', $_POST['userEmail'])->exists()) {

            $user = User::where('email', $_POST['userEmail'])->first();

            if (password_verify($_POST['userPassword'], $user->password)) {
                $_SESSION['isAuth'] = true;

                if ($user->role == 'admin'){
                    header('Location: /admin/');
                    exit;
                }

            } else {
                echo 'неверный пароль <br>';
                $_SESSION['isAuth'] = false;
            }

        } else  {
            echo 'такого нет';
        }

        var_dump($_SESSION);
        var_dump($this);
    }

    public function logout()
    {
        $_SESSION['isAuth'] = false;
        header('Location: /');
        exit;
    }

}