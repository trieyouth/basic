<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 16-1-2
 * Time: 下午5:29
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = '添加菜品';
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
<div class="container text-center">
    <div class="row login-row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="text-left content login-content">
                <div class="divide-40"></div>
                <form  role="form">
                    <div class="form-group">
                        <label for="name">菜品名称</label>
                        <input type="text" class="form-control" id="dish_update_name"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">价格</label>
                        <input type="text" class="form-control" id="dish_update_price"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">折扣</label>
                        <input type="text" class="form-control" id="dish_update_discount"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">意见</label>
                        <input type="text" class="form-control" id="dish_update_advice"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">描述</label>
                        <input type="text" class="form-control" id="dish_update_desc"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputfile">菜品图片</label>
                        <input type="file" id="inputfile">
                    </div>
                    <button type="submit" class="btn  btn-primary btn-lg btn-block"
                            style="margin-bottom: 8px">提交
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
