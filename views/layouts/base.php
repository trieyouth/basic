<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-11
 * Time: 上午10:02
 */
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
