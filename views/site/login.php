<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;


$this->title = 'Login';
?>

<h1>Login</h1>

<div class="row justify-content-center">
    <div class="col-sm-6">
        <?= Html::beginForm([''], 'post'); ?>

        <div class="py-1">
            <label for="" class="form-label fw-bold">Email:</label>
            <input type="text" class="form-control" name="email">
        </div>

        <div class="py-1">
            <label for="" class="form-label fw-bold">Password:</label>
            <input type="text" class="form-control" name="password">
        </div>

        <div class="py-1">
            <button class="btn btn-success">Login</button>
        </div>
        <?= Html::endForm(); ?>

        <p class="text-danger"><?= $err; ?></p>
    </div>
</div>
