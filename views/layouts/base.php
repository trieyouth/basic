<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-11
 * Time: 上午10:02
 */
use app\assets\LayoutAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

LayoutAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="navbar clearfix">
    <div class="container">
        <div id="sidebar-collapse" class="sidebar-collapse btn">
            <img class="fa fa-bars" src="<?php echo Url::to('@web/img/menu.png') ?>" height="24"/>
        </div>
        <div class="navbar-brand">
            <a href="<?php echo Url::to('index.php?r=home/index') ?>">
                <img src="<?php echo Url::to('@web/img/logo.png') ?>" class="img-responsive" height="30" width="120">
            </a>
        </div>
    </div>
</header>
<section id="page">
    <div id='sidebar' class="kv-sidebar">
        <div id="null" class="sidebar-menu nav-collapse">
            <div class="divide-20"></div>
            <div id="search-bar">
                <input class="search" placeholder="Search" type="text"><i class=""></i>
            </div>
            <ul class="list-unstyled">
                <li>
                    <a class="" href="frontend_theme/index.html" target="_blank">
                        <i class="fa fa-desktop fa-fw">
                        </i>
                <span class="menu-text">
                    Frontend Theme
                </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
