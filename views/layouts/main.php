<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<div style="position: relative; overflow: hidden; height: 100%">
    <div class="top">
        <img src="<?php echo Url::to('@web/img/menu.png', true) ?>" class="menu_btn" align="left"/>
        <font style="padding-left: 10px;">控制台</font>
    </div>
    <div class="container" style="overflow-y:auto;height: 100%;width: 100%">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
    <div id="grey_back">
        &nbsp;</div>
    <div id="menu_left" class="menu_mobile_app" align="left" style="overflow-y:auto">
        <div class="background_profile" style="background-image: url(<?php echo $this->params['back'] ?>)">
        </div>
        <div class="head_profile" style="background-image: url(<?php echo $this->params['head'] ?>)">
        </div>
        <div class="name_profile"><?php echo $this->params['name'] ?></div>
        <a href="#">
            <div class="menu-item">
                <img src="<?php echo Url::to('@web/img/menu.png', true) ?>" style="height: 36px;margin-left: 16px"/>
                <font style="margin-left: 16px">app申请</font>
            </div>
        </a>
        <a href="#">
            <div class="menu-item">
                <img src="<?php echo Url::to('@web/img/menu.png', true) ?>" style="height: 36px;margin-left: 16px"/>
                <font style="margin-left: 16px">菜单管理</font>
            </div>
        </a>
        <a href="#">
            <div class="menu-item">
                <img src="<?php echo Url::to('@web/img/menu.png', true) ?>" style="height: 36px;margin-left: 16px"/>
                <font style="margin-left: 16px">账单</font>
            </div>
        </a>
    </div>
</div>