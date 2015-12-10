<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-10
 * Time: 下午3:59
 */
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>