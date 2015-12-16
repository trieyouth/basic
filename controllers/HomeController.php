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
use yii\filters\AccessControl;

class HomeController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = "@app/views/layouts/base.php";
        IntentUtil::sendParams('youth','@web/img/welcome.png');
        return $this->render('index');
    }

}