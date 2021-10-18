<?php

use App\Model\Post;

include 'header.php';

$posts = Post::all()->sortByDesc('id');

?>
    <div class="container">

        <div>
            <h3><?= $title ?></h3>

        </div>

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
                        <th scope="row"><?= $post->id ?></th>
                        <td><?= $post->header ?></td>
                        <td>
                            <a href="/posts/<?= $post->id ?>">
                                <?= $post->text?>
                            </a>
                        </td>
                        <td><?= $post->date ?></td>
                    </tr>

                <? endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
include 'footer.php';
