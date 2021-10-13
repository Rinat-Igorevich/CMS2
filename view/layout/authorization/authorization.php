<?php

include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/header.php';

?>

<body class="text-center" style="align-items: center; display: contents">
<main class="form-signin">
    <form style="display: contents width: 100%; max-width: 330px; padding: 15px; margin: auto;">

        <img class="mb-4" src="/content/img/logo.png" alt="" width="105" height="106">
        <h1 class="h3 mb-3 fw-normal">Пожалуйста, авторизуйтесь</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Пароль</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Запомнить
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
</main>
</body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/footer.php';