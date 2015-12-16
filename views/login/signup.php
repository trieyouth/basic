<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-16
 * Time: 下午6:40
 */
use app\assets\LoginAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
LoginAsset::register($this);
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
<body class="login"
      style="">
<?php $this->beginBody() ?>
<div class="container text-center">
    <div class="row login-row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="text-left content login-content">
                <h2 class="bigintro">注册</h2>
                <div class="divide-40"></div>
                <?php $form = ActiveForm::begin(['options' => [
                    'class' => 'form-horizontal text-left'
                ]]); ?>
                <?= $form->field($model, 'id',
                    ['options' => ['class' => 'form-group'],
                        'labelOptions' => ['label' => '邮箱', 'class' => 'col-sm-3 control-label'],
                        'template' => '{label}<div class="col-lg-8">{input}</div></dr><div class="col-sm-offset-1 col-sm-10">{error}</div>'])
                    ->textInput(['options' => 'form-control']) ?>
                <?= $form->field($model, 'real_name',
                    ['options' => ['class' => 'form-group'],
                        'labelOptions' => ['label' => '餐厅名称', 'class' => 'col-sm-3 control-label'],
                        'template' => '{label}<div class="col-lg-8">{input}</div></dr><div class="col-sm-offset-1 col-sm-10">{error}</div>'])
                    ->textInput(['options' => 'form-control']) ?>
                <?= $form->field($model, 'pwd',
                    ['options' => ['class' => 'form-group'],
                        'labelOptions' => ['label' => '密码', 'class' => 'col-sm-3 control-label'],
                        'template' => '{label}<div class="col-lg-8">{input}</div></dr><div class="col-sm-offset-1 col-sm-10">{error}</div>'])
                    ->passwordInput(['options' => 'form-control']) ?>
                <?= $form->field($model, 'pwd2',
                    ['options' => ['class' => 'form-group'],
                        'labelOptions' => ['label' => '确认密码', 'class' => 'col-sm-3 control-label'],
                        'template' => '{label}<div class="col-lg-8">{input}</div></dr><div class="col-sm-offset-1 col-sm-10">{error}</div>'])
                    ->passwordInput(['options' => 'form-control']) ?>
                <?= $form->field($model, 'add',
                    ['options' => ['class' => 'form-group'],
                        'labelOptions' => ['label' => '餐厅地址', 'class' => 'col-sm-3 control-label'],
                        'template' => '{label}<div class="col-lg-8">{input}</div></dr><div class="col-sm-offset-1 col-sm-10">{error}</div>'])
                    ->textInput(['options' => 'form-control']) ?>
                <?= $form->field($model, 'passport',
                    ['options' => ['class' => 'form-group'],
                        'labelOptions' => ['label' => '营业许可证', 'class' => 'col-sm-3 control-label'],
                        'template' => '{label}<div class="col-lg-8">{input}</div></dr><div class="col-sm-offset-1 col-sm-10">{error}</div>'])
                    ->textInput(['options' => 'form-control']) ?>
                <?= $form->field($model, 'id_card',
                    ['options' => ['class' => 'form-group'],
                        'labelOptions' => ['label' => '身份证号', 'class' => 'col-sm-3 control-label'],
                        'template' => '{label}<div class="col-lg-8">{input}</div></dr><div class="col-sm-offset-1 col-sm-10">{error}</div>'])
                    ->textInput(['options' => 'form-control']) ?>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <?= Html::submitButton('注册', ['class' => 'btn btn-primary col-lg-10', 'name' => 'signup-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <div class="divide-20"></div>
                <div class="col-sm-offset-1 login-helpers">
                    <a href="<?php echo Url::to('index.php?r=login/login')?>">返回登陆</a> <br>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
?>