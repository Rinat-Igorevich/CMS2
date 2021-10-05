<?php

use App\Model\Post;

include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/header.php';

$posts = Post::all();
?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Header</th>
            <th scope="col">Text</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <th scope="row"><?=$post->getAttributeValue('id')?></th>
                    <td><?=$post->getAttributeValue('header')?></td>
                    <td><?=$post->getAttributeValue('text')?></td>

                </tr>
            <? endforeach;?>
        </tbody>
    </table>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/footer.php';
