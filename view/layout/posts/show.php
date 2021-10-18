<?php

use App\Model\Comment;
use App\Model\Post;
use App\Model\User;

$post = Post::find($id);
$user = User::find(4);
$comments = Comment::where('post_id', $id )->get();

include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/header.php';
?>
    <div class="container">

        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                <?= $post->header ?>
            </h3>

            <article class="blog-post">
                <?= $post->text ?>
            </article>
            <hr>
        </div>
        <h4>Комментарии</h4>
        <hr>
        <?php foreach ($comments as $comment): ?>
            <img src="<?= User::find($comment->user_id)->photo ?>" alt="" width="32" height="32" class="rounded-circle me-2">
            <b><?= $comment->date ?></b>
            <b><?= User::find($comment->user_id)->email ?></b>
            <p style="margin-left: 20px"><?= $comment->text ?></p>

        <?php endforeach; ?>
        <form name="comment" action="comment.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Добавить комментарий</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <p>
                <input type="hidden" name="page_id" value="150"/>
                <input class="btn btn-primary" type="submit" value="Отправить">
            </p>
        </form>
    </div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/footer.php';