<?php

/** @var yii\web\View $this */

$this->title = 'Home Page';


?>

<?php if(isset($_COOKIE['city']) && isset($_SESSION['login'])) : ?>

    <h1>Reviews from <?= $current_city['name'] ?></h1>

    <?php if($reviews) : ?>

    <div class="row">
        <?php foreach ($reviews as $elem) : ?>
        <div class="col-sm-6 my-2">
            <div class="card">
                <div class="card-body">
                    <em class="text-primary"><?= $elem['date_create'] ?></em>
                    <?php if($elem['img']) : ?>
                        <img class="card-img" src="/upload/<?= $elem['img'] ?>">
                    <?php endif; ?>

                    <h5><?= $elem['title'] ?></h5>
                    <p><?= $elem['text'] ?></p>
                    <p><b>Rating:</b>
                        <?php for($i = 0; $i < $elem['rating']; $i++) : ?>
                            <span class="text-warning">&starf;</span>
                        <?php endfor; ?>
                    </p>
                    <p class="text-success"><b>Author: </b> <?= $elem['fio'] ?></p>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php else : ?>

    <h1 class="text-muted">No reviews</h1>

    <?php endif; ?>


<?php elseif(isset($_COOKIE['city'])) : ?>

    <h1>Login please</h1>
    <a href="/web/?r=site/login" class="btn btn-primary">Login</a>

<?php else : ?>

    <h1>Choise your city</h1>

    <div class="list-group">
        <?php foreach($citys as $city) : ?>
            <div class="list-group-item">
                <a href="/web/?r=site/index&city=<?= $city['id'] ?>"><?= $city['name']; ?></a>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>
