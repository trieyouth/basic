<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 16-1-2
 * Time: 下午8:07
 */

use app\assets\EchartsAsset;
use Hisune\EchartsPHP\ECharts;
use yii\helpers\Html;

$this->title = '销售趋势图';
$this->params['breadcrumbs'][] = $this->title;
$asset = EchartsAsset::register($this);
$chart = new ECharts();
$chart->tooltip->show = true;
$chart->color=array(
);
$chart->legend->data = array('销售量柱状','销售量折线');
$chart->calculable = true;
$chart->xAxis = array(
    array(
        'type' => 'category',
        'data' => array_keys($list)
    )
);
$chart->yAxis = array(
    array(
        'type' => 'value',
        'name' => '销售额',
        'max'=>50000,
        'splitNumber'=>10,
        'axisLabel' => array('formatter' => '{value} 元')
    )
);
$chart->series = array(
    array(
        'name' => '销售量柱状',
        'type' => 'bar',
        'data' => array_values($list)
    ),
    array(
        'name' => '销售量折线',
        'type' => 'line',
        'data' => array_values($list),
    ),
);
echo $chart->render('main')
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
<div id="main"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
