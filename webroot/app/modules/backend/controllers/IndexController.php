<?php

namespace app\modules\backend\controllers;


use Yii;
use yii\web\Controller;


class IndexController extends Controller
{

    public $enableCsrfValidation = false;


     public function actionIndex()
     {
         return $this->renderFile('www/index.html');

     }

}