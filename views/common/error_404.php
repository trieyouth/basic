<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-15
 * Time: 下午9:29
 */
use app\assets\ErrorAsset;
use yii\helpers\Html;
use yii\helpers\Url;

ErrorAsset::register($this)
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
        <link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="divide-100"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-3">
                <div class="error">
                    404
                </div>
            </div>
            <div class="col-sm-4 col-sm-offset-3 text-left">
                <div class="content">
                    <h3>迷失荒野了吗？</h3>
                    <p>
                        您访问的页面发生错误<br/>
                        请查看你的网址是否有误, <a
                            href="<?php echo Url::to("/basic/web/index.php?r=login/login", true) ?>">返回主页</a>
                </div>
                <form action="#">
                    <div class="input-group">
                        <input class="form-control" placeholder="search here..." type="text">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
							</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>