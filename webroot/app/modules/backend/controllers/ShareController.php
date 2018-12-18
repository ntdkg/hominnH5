<?php
/**
 * Created by PhpStorm.
 * User: archisense
 * Date: 2018/11/15
 * Time: 18:25
 */

namespace app\modules\backend\controllers;
use app\components\BaseController;
use yii\web\Controller;
use app\components\ResultCodeManager;
use app\modules\backend\models\HomeinnQuestionAndAnswer;
use bedezign\yii2\audit\Audit;
use Yii;
use EasyWeChat\Factory;


class ShareController extends BaseController {
    public function actionGetShare() {
        $post = Yii::$app->request->post();

        $app = Yii::$app->wechat->app;

        $app->jssdk->setUrl($post['url']);
        return \GuzzleHttp\json_decode($app->jssdk->buildConfig(array('onMenuShareQQ', 'onMenuShareWeibo'), true));
    }
}



