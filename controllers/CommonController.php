<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-15
 * Time: 下午4:45
 */
namespace app\controllers;

use Yii;
use yii\base\Controller;

class CommonController extends Controller
{

    public $layout = false;

    public function  actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            if(strcmp($exception->getMessage(),'Page not found.') == 0){
                return $this->render('error_404');
            }
        }
    }
}