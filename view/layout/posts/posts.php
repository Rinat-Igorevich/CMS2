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
<!--    <div class="list-group">-->
<?php //foreach ($posts as $post): ?>
<!--        <a href="posts/--><?//=$post->getAttributeValue('id')?><!--" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">-->
<!--            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">-->
<!--            <div class="d-flex gap-2 w-100 justify-content-between">-->
<!--                <div>-->
<!--                    <h6 class="mb-0">--><?//=$post->getAttributeValue('header')?><!--</h6>-->
<!--                    <p class="mb-0 opacity-75">--><?//=$post->getAttributeValue('text')?><!--</p>-->
<!--                </div>-->
<!--                <small class="opacity-50 text-nowrap">now</small>-->
<!--            </div>-->
<!--        </a>-->
<!---->
<?// endforeach;?>
<!--    </div>-->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/footer.php';
