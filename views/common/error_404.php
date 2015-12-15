<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-15
 * Time: 下午9:29
 */
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this)
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
    <body style="background: url('<?php echo Url::to("@web/img/error_background.jpg") ?>')">
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="divide-100"></div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="col-md-12 not-found">
                    <div class="error">
                        404
                    </div>
                </div>
                <div class="col-md-5 not-found">
                    <div class="content">
                        <h3>Are you lost in the wild?</h3>

                        <p>
                            Sorry, but the page you're looking for has not been found<br/>
                            Try checking the URL for errors, <a href="<?php echo Url::to("/basic/web/index.php?r=login/login",true)?>">goto home</a> or try to search below.
                        </p>

                        <form action="#">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="search here...">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
							</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>