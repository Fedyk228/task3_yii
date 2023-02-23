<?php

use yii\bootstrap5\Html;

$this->title = 'Add review';
?>


<?php if(isset($_COOKIE['city']) && isset($_SESSION['login'])) : ?>


<h1>Add review</h1>

<div class="row">
    <div class="col-sm-6 offset-3">
        <?= Html::beginForm([''], 'post', ['enctype' => 'multipart/form-data']); ?>
            <div class="py-1">
                <label for="" class="form-label fw-bold">Title:</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="py-1">
                <label for="" class="form-label fw-bold">Text:</label>
                <textarea name="text" rows="3" class="form-control"></textarea>
                <input type="hidden" name="post_id" value="<?= $_GET['id'] ?>">
            </div>
            <div class="py-1">
                <label for="" class="form-label fw-bold">Rating:</label>
                <select class="form-select" name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="py-1">
                <label for="" class="form-label fw-bold">Image:</label>
                <input type="file" class="form-control" name="img">
            </div>
            <div class="py-1">
                <button class="btn btn-success">Add comment</button>
            </div>
        <?= Html::endForm(); ?>

        <p class="text-success"><?= $notify; ?></p>
    </div>
</div>

<?php elseif(isset($_SESSION['login'])) : ?>

    <h1>Choise your city</h1>
    <a href="/web/?r=site/index" class="btn btn-primary">Choise city</a>

<?php else : ?>

    <h1>Login please</h1>
    <a href="/web/?r=site/login" class="btn btn-primary">Login</a>

<?php endif; ?>