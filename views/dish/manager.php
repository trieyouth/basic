<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 16-1-1
 * Time: 下午4:34
 */
use yii\helpers\Html;
$this->title = '菜单管理';
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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
