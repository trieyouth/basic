<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-25
 * Time: 下午3:02
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;


\app\assets\DisplayAsset::register($this);
$this->title = '菜单展示';
$this->params['breadcrumbs'][] = $this->title;
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
<div class="row">
    <?php foreach ($list as $dish): ?>
        <div class="col-lg-3" style="margin-top: 32px">
            <center>
                <div class="col-lg-12" style="float:none; display:block; margin-left: auto;  margin-right: auto;">
                    <div class="col-lg-12 dish_box">
                        <div id="dish-box-content" class="col-lg-12 col-md-12">
                            <div class="row">
                                <img id="dish-box-img"
                                     src="<?= Html::encode($dish['p_id']) ?> "
                                     class="img-responsive">
                            </div>
                            <div class="row" style="text-align: left">
                                <p>菜品id: <?= Html::encode($dish['dish_id']) ?></p>
                            </div>
                            <div class="row" style="text-align: left">
                                <p>菜名: <?= Html::encode($dish['dish_name']) ?></p>
                            </div>
                            <div class="row" style="text-align: left">
                                <p>价格: <?= Html::encode($dish['price']) ?>￥/份</p>
                            </div>
                            <div class="row" style="text-align: left">
                                <p>打折: <?= Html::encode($dish['discount']) ?>折</p>
                            </div>
                            <div class="row" style="text-align: left">
                                <p>描述: <?= Html::encode($dish['desc']) ?></p>
                            </div>
                            <div class="row col-lg-12" style="float:none; display:block; margin-left: auto;  margin-right: auto; margin-bottom: 16px">
                                <button type="button" class="btn  btn-primary btn-lg btn-block">修改</button>
                                <button type="button" class="btn btn-info col-lg-4 btn-lg btn-block" >查看详情</button>
                                <button type="button" class="btn btn-danger col-lg-4 btn-lg btn-block">删除</button>
                            </div>
                        </div>
                    </div>
            </center>
        </div>
    <?php endforeach; ?>
</div>
<div class="col-lg-12" style="float:none; display:block; margin-left: auto;  margin-right: auto;">
    <?= LinkPager::widget(['pagination' => $page]) ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
