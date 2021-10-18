<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/assets/js/scripts.js" defer=""></script>

    <title><?= $title ?? '' ?></title>

</head>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="/content/img/RI-logo.png" alt="logo" width="200" height="55"> </img>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/posts" class="nav-link link-secondary">Главная</a></li>
        <li><a href="/admin/profile" class="nav-link px-2 link-dark">Личный кабинет</a></li>
        <li><a href="/admin/rules" class="nav-link px-2 link-dark">Правила</a></li>
        <li><a href="/admin/users" class="nav-link px-2 link-dark">Пользователи</a></li>
        <li><a href="/admin/rules" class="nav-link px-2 link-dark">комментарии</a></li>
        <li><a href="/admin/about" class="nav-link px-2 link-dark">About</a></li>
    </ul>
    <?php if (isset($_SESSION['isAuth']) && $_SESSION['isAuth'] == false): ?>
        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2" onclick="document.location='/login'">Авторизация</button>
            <button type="button" class="btn btn-primary" onclick="document.location='/registration'">Регистрация</button>
        </div>
    <?php elseif (isset($_SESSION['isAuth']) && $_SESSION['isAuth'] == true): ?>
        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2" onclick="document.location='/logout'">Выйти</button>
        </div>
    <?php endif; ?>

</header>
<body>
<div class="container">
    <div class="wrapper" style="display: contents ">