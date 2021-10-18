<?php

use App\Model\User;

include 'header.php';

$users = User::all();
?>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Роль</th>
                <th scope="col">Подписка</th>
                <th scope="col">Изменить</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>

                <tr>
                    <th scope="row"><?= $user->id ?></th>
                    <td><?= $user->name ?> </td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->role ?> </td>
                    <td><input type="checkbox" disabled <?php if ($user->accept_notification) echo 'checked'?>></td>
                    <td><a href="users/edit/<?=$user->id?>"><img src="/content/img/edit.png" width="15" height="15"></a></td>
                </tr>

            <? endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
include 'footer.php';
