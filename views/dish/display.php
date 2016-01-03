<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-25
 * Time: 下午3:02
 */
use yii\helpers\Html;
use yii\helpers\Url;
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
<div class="col-lg-12" style="float:none; display:block; margin-left: auto;  margin-right: auto;">
    <?= LinkPager::widget(['pagination' => $page]) ?>
</div>
<div class="row">
    <?php foreach ($list as $dish): ?>
        <div class="col-lg-3" style="margin-top: 32px">
            <center>
                <div class="col-lg-12" style="float:none; display:block; margin-left: auto;  margin-right: auto;">
                    <div class="col-lg-12 dish_box">
                        <div id="dish-box-content" class="col-lg-12 col-md-12">
                            <div class="row">
                                <img id="dish-box-img"
                                     src="<?php echo Url::to('@web/img/default_dish.jpg') ?>"
                                     class="img-responsive"
                                     style="margin-top: 8px">
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
                            <div class="row col-lg-12"
                                 style="float:none; display:block; margin-left: auto;  margin-right: auto;">
                                <button type="button" class="btn  btn-primary btn-lg btn-block"
                                        onclick="showUpdate('dish_update_form_<?= Html::encode($dish['dish_id']) ?>')"
                                        style="margin-bottom: 8px">修改<span class="caret"></span<></button>
                                <form id="dish_update_form_<?= Html::encode($dish['dish_id']) ?>" role="form"
                                      style="display:none;" action="<?php echo Url::to('index.php?r=dish/update') ?>">
                                    <div class="form-group">
                                        <label for="name">id</label>
                                        <input type="text" class="form-control" id="dish_update_id"
                                               placeholder="<?= Html::encode($dish['dish_id']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">菜名</label>
                                        <input type="text" class="form-control" id="dish_update_name"
                                               placeholder="<?= Html::encode($dish['dish_name']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">价格</label>
                                        <input type="text" class="form-control" id="dish_update_price"
                                               placeholder="<?= Html::encode($dish['price']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">折扣</label>
                                        <input type="text" class="form-control" id="dish_update_discount"
                                               placeholder="<?= Html::encode($dish['discount']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">意见</label>
                                        <input type="text" class="form-control" id="dish_update_advice"
                                               placeholder="<?= Html::encode($dish['advice']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">描述</label>
                                        <input type="text" class="form-control" id="dish_update_desc"
                                               placeholder="<?= Html::encode($dish['desc']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputfile">菜品图片</label>
                                        <input type="file" id="inputfile">
                                    </div>
                                    <button type="submit" class="btn  btn-primary btn-lg btn-block"
                                            style="margin-bottom: 8px">提交
                                    </button>
                                </form>
                                <button type="button" class="btn btn-info col-lg-4 btn-lg btn-block">查看详情</button>
                                <button onclick="deleteDish(<?= Html::encode($dish['dish_id']) ?>)" type="button"
                                        class="btn btn-danger col-lg-4 btn-lg btn-block"
                                        style="margin-bottom: 16px">删除
                                </button>
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
