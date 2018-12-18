<?php

namespace app\components;


use Yii;
use yii\web\Controller;


class BaseController extends Controller
{

    public $enableCsrfValidation = false;


    public function init()
    {
        header("Access-Control-Allow-Origin: *");
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->charset = 'UTF-8';
    }


    protected function checkParams($type,$validParams){

        $post = Yii::$app->request->$type();
        foreach ($validParams as $val){
            if(!array_key_exists($val,$post))
                $this->buildResult(ResultCodeManager::MISS_REQUIRED_PARAM, ResultCodeManager::$messages[ResultCodeManager::MISS_REQUIRED_PARAM]);
        }
        return $post;
    }

    protected function buildResult($code, $msg, $data = []) {

        $result = [];
        $result['code'] = $code;
        $result['msg'] = $msg;
        $result['data'] = $data;
        die (json_encode($result, true));
    }

}