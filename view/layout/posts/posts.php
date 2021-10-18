<?php

use App\Model\Post;

include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/header.php';

$posts = Post::all();
?>
<div class="container">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Header</th>
            <th scope="col">Text</th>
            <th scope="col">date</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>

                <tr>
                    <th scope="row" ><?=$post->getAttributeValue('id')?></th>
                    <td><?=$post->getAttributeValue('header')?></td>
                    <td>
                        <a href="/posts/<?=$post->getAttributeValue('id')?>">
                        <?=$post->getAttributeValue('text')?>
                        </a>
                    </td>
                    <td><?=$post->getAttributeValue('date')?></td>
                </tr>

            <? endforeach;?>
        </tbody>
    </table>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/footer.php';
