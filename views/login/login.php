<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-13
 * Time: 下午4:05
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
    <body style="background: url('<?php echo Url::to("@web/img/5.jpg")?>')">
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div style="margin:0 auto ;margin-top:8%;box-shadow: 0 0 2px #999999;width: 68%;padding-top: 6%;padding-bottom: 6%">
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['options' => [
                    'class' => 'form-horizontal'
                ]]); ?>
                <?= $form->field($model, 'username',
                    ['options' => ['class' => 'form-group'],
                        'labelOptions' => ['label' => '用户名', 'class' => 'col-sm-2 control-label'],
                        'template' => '{label}<div class="col-lg-8">{input}</div></dr><div class="col-sm-offset-2 col-sm-10">{error}</div>'])
                    ->textInput(['options' => 'form-control']) ?>
                <?= $form->field($model, 'password',
                    ['options' => ['class' => 'form-group'],
                        'labelOptions' => ['label' => '密码', 'class' => 'col-sm-2 control-label'],
                        'template' => '{label}<div class="col-lg-8">{input}</div></dr><div class="col-sm-offset-2 col-sm-10">{error}</div>'])
                    ->passwordInput(['options' => 'form-control']) ?>
                <?= $form->field($model, 'rememberMe', ['options' => ['class' => 'form-group']])->checkbox([
                    'template' => "<div class=\"col-sm-offset-2 col-sm-10\">{input} 记住我</div></dr><div class=\"col-lg-8\">{error}</div>",
                ]) ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?= Html::submitButton('登陆', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <div class="col-sm-offset-2 login-helpers">
                    <a href="#">忘记密码?</a> <br>
                    没有账号？ <a href="#">立即注册</a>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>