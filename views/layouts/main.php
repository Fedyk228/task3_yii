<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?php $this->head() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<?php $this->beginBody();

?>
<header>
    <div class="container d-flex justify-content-between align-items-center">
        <a href="/web/?r=site/index" class="logo">Reviews App</a>

        <nav>
            <a href="/web/?r=site/index" class="me-3">Home</a>

            <?php if(isset($_SESSION['login'])) : ?>
                <a href="/web/?r=site/add-review">Add review</a> |
                <a href="/web/?r=site/&p=logout" class="text-danger">Logout, <?= $_SESSION['login']['fio']; ?></a>
            <?php else : ?>
                <a href="/web/?r=site/login" class="me-3">Login</a>
                <a href="/web/?r=site/register">Register</a>
            <?php endif; ?>

        </nav>
    </div>
</header>

<main>
    <div class="container py-3">
        <?= $content ?>
    </div>
</main>


<?php

$this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>
