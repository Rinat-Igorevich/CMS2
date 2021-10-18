<?php

use App\Model\User;

include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/header.php';

$user = User::find(4);

?>
    <h3><?= $title ?></h3>
    <hr>
    <div class="profile_wrapper">
        <div class="profile">
            <img src="/content/uploads/User.jpg" width="200" height="200" style="margin: 10px " class="rounded-start" alt="Photo">
            <div>
                <hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $user->name ?></li>
                    <li class="list-group-item"><?= $user->email ?></li>
                </ul>
                <hr>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Подписаться на обновления</label>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Загрузить фото</label>
        </div>
        <hr>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">О себе</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $user->about ?></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Сохранить">

        <hr>
    </div>


<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/footer.php';