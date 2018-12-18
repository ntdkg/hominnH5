<?php

namespace app\modules\backend\controllers;


use app\modules\backend\models\HomeinnChannel;
use Yii;
use yii\web\Controller;
use app\components\BaseController;
use app\components\ResultCodeManager;
use app\modules\backend\models\HomeinnForm;
use app\modules\backend\models\HomeinnQuestionAndAnswer;
use app\modules\backend\models\HomeinnResult;

class ApiController extends BaseController
{


    public function actionIndex()
    {
        $validParams = ['params'];
        $params = $this->checkParams('post', $validParams);
        $obj= HomeinnChannel::saveChannel($params);
        if ($obj) {
            $this->buildResult(ResultCodeManager::SUCCESS, ResultCodeManager::$messages[ResultCodeManager::SUCCESS], $obj);
        } else {
            $this->buildResult(ResultCodeManager::NO_CODE_DATA, ResultCodeManager::$messages[ResultCodeManager::NO_CODE_DATA]);
        }

    }
    public function actionGetAllQuestionAndAnswer() {

        $obj= HomeinnQuestionAndAnswer::getAllQuestionAndAnswer();
        if ($obj) {
            $this->buildResult(ResultCodeManager::SUCCESS, ResultCodeManager::$messages[ResultCodeManager::SUCCESS], $obj);
        } else {
            $this->buildResult(ResultCodeManager::NO_CODE_DATA, ResultCodeManager::$messages[ResultCodeManager::NO_CODE_DATA]);
        }

    }

    public function actionSaveResultAndGetFinalAnswer() {

        $value=[];

        $post = Yii::$app->request->post();

        foreach ($post['question'] as $k => $v){
            $k=$k+1;
            $value['question'.$k]=$v;
        }

        $obj= HomeinnResult::getSaveResultAndGetFinalAnswer($value);
        if ($obj) {
            $this->buildResult(ResultCodeManager::SUCCESS, ResultCodeManager::$messages[ResultCodeManager::SUCCESS], $obj);
        } else {
            $this->buildResult(ResultCodeManager::NO_CODE_DATA, ResultCodeManager::$messages[ResultCodeManager::NO_CODE_DATA]);
        }

    }

    public function actionSaveForm() {

        $validParams = ['name','phonenumber','result_number'];
        $params = $this->checkParams('post', $validParams);
        $obj= HomeinnForm::saveForm($params);
        if ($obj) {
            $this->buildResult(ResultCodeManager::SUCCESS, ResultCodeManager::$messages[ResultCodeManager::SUCCESS], $obj);
        } else {
            $this->buildResult(ResultCodeManager::NO_CODE_DATA, ResultCodeManager::$messages[ResultCodeManager::NO_CODE_DATA]);
        }

    }
    public function actionGetFeedback() {

        $validParams = ['starttime','endtime'];
        $params = $this->checkParams('get', $validParams);

        $obj= HomeinnForm::getResultFeedback($params);

        if ($obj) {
            return $obj;
        } else {
            return false;
        }

    }

}
