<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-11
 * Time: 上午10:16
 */
namespace app\controllers;

use app\util\IntentUtil;
use Yii;
use yii\base\Controller;

class HomeController extends Controller
{
    public $layout = "@app/views/layouts/base.php";

    public function actionIndex()
    {
        IntentUtil::sendParams('youth','@web/img/welcome.png');
        return $this->render('index');
    }

}