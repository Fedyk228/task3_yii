<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;


$this->title = 'Register';
?>

<h1>Register</h1>

<div class="row justify-content-center">
    <div class="col-sm-6">
        <?= Html::beginForm([''], 'post'); ?>
        <div class="py-1">
            <label for="" class="form-label fw-bold">FIO:</label>
            <input type="text" class="form-control" name="fio">
        </div>
        <div class="py-1">
            <label for="" class="form-label fw-bold">Email:</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="py-1">
            <label for="" class="form-label fw-bold">Phone:</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="py-1">
            <label for="" class="form-label fw-bold">Password:</label>
            <input type="text" class="form-control" name="password">
        </div>
        <div class="py-1">
            <label for="" class="form-label fw-bold">Repeat password:</label>
            <input type="text" class="form-control" name="r_password">
        </div>
        <div class="py-1">
            <button class="btn btn-success">Register</button>
        </div>
        <?= Html::endForm(); ?>

        <p class="text-success"><?= $notify; ?></p>
        <p class="text-danger"><?= $err; ?></p>
    </div>
</div>
