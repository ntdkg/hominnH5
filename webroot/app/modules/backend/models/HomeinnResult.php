<?php

namespace app\modules\backend\models;
use yii\data\Pagination;
use phpDocumentor\Reflection\Types\Self_;
use Yii;

/**
 * This is the model class for table "tbl_homeinn_result".
 *
 * @property int $id
 * @property string $question1
 * @property string $question2
 * @property string $question3
 * @property string $question4
 * @property string $question5
 * @property string $question6
 * @property int $final_id
 * @property int $create_time
 * @property string $result_number
 */
class HomeinnResult extends \yii\db\ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tbl_homeinn_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['final_id', 'create_time'], 'integer'],
            [['question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'result_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'question1' => 'Question1',
            'question2' => 'Question2',
            'question3' => 'Question3',
            'question4' => 'Question4',
            'question5' => 'Question5',
            'question6' => 'Question6',
            'final_id' => 'Final ID',
            'create_time' => 'Create Time',
            'result_number' => 'Result Number',
        ];
    }

    public function getHomeinnFinalanswer() {
        return $this->hasOne(HomeinnFinalanswer::className(), ['final_id' => 'id']);
    }


    public static function getSaveResultAndGetFinalAnswer($params) {

        $answerlist = array_count_values(array_values($params));
        if (!isset($answerlist['A'])) {
            $answerlist['A'] = 0;
        }
        if (!isset($answerlist['B'])) {
            $answerlist['B'] = 0;
        }
        if (!isset($answerlist['C'])) {
            $answerlist['C'] = 0;
        }
        //   if (isset($answerlist['A']) && isset($answerlist['B']) && isset($answerlist['C'])) {
        $score = $answerlist['A'] * 15 + $answerlist['B'] * 5 + $answerlist['C'] * 3;
        $finalid = intval(($score - 6) / 9);//计算final
        if ($finalid == 0) {
            $finalid = 1;
        }
            if ($finalid==9){
                $finalid=rand(0,8);
            }
            $result_number = uniqid();

            $model = new static();

            $model->question1 = $params['question1'];
            $model->question2 = $params['question2'];
            $model->question3 = $params['question3'];
            $model->question4 = $params['question4'];
            $model->question5 = $params['question5'];
            $model->question6 = $params['question6'];
            $model->final_id = $finalid;
            $model->result_number = $result_number;
            $model->create_time = time();
            $data = array(
                'id' => $finalid,
                // 'final'=>$finalanswer['final'],
                'result_number' => $result_number
            );

            if (!$model->save()) {
                return false;
            } else {
                return $data;
            }


        }

    public function getHomeinnForm() {
        return $this->hasOne(HomeinnForm::className(), ['result_number' => 'result_number']);
    }

    public static function getResultFeedback(){
        ///   $OneMonthBefore=date(strtotime("-1 month"));
        $page = new Pagination(['pageSize' => '7']);
        $feedback = static::find()
            ->joinWith('homeinnForm H')
            ->offset($page->offset)
            ->limit($page->limit)
            ->select("H.id,
            question1,
            question2,H.result_number,
            question3,H.name,
            question4,H.phonenumber,
            question5,question6,
            final_id,
            from_unixtime(create_time) createtime")
            //   ->where(['>', 'C.ref_date', $OneMonthBefore])
            ->orderBy('create_time desc')
            ->asArray()
            ->all();


        return $feedback;
    }





     public   static function generate_randomword($length = 10) {

            // 第二种是取字符数组 $chars 的任意元素
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

            $password = '';

            for ($i = 0; $i < $length; $i++) {

                $password .= $chars[mt_rand(0, strlen($chars) - 1)];
            }

            return $password;

        }
    }
