<?php

namespace app\modules\backend\models;
use yii\data\Pagination;
use Yii;

/**
 * This is the model class for table "tbl_homeinn_form".
 *
 * @property int $id
 * @property string $name
 * @property int $phonenumber
 * @property int $result_number
 * @property string $wechat_open_id
 */
class HomeinnForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_homeinn_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['wechat_open_id', 'result_number'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phonenumber' => 'Phonenumber',
            'result_number' => 'Result Number',
            'wechat_open_id' => 'Wechat Open ID',
        ];
    }
    public function getHomeinnResult() {
        return $this->hasOne(HomeinnResult::className(), ['result_number' => 'result_number']);
    }
    public static function saveForm($params){
        $model = new static();


        $modelnumber = static::find()->where(['result_number'=>$params['result_number']])->asArray()->one();

        if ($modelnumber){

            return true;
        }




        $model->name=$params['name'];
        $model->phonenumber=$params['phonenumber'];
        $model->result_number=$params['result_number'];
        $model->wechat_open_id=$params['wechat_open_id'];

      //  $model->create_time=time();

        if (!$model->save()) {
           return   false;
        }else{
            return true;
        }

    }

    public static function getResultFeedback($params){

        $startime=strtotime($params['starttime']);
        $endtime=strtotime($params['endtime']);
        $feedback = static::find()
            ->joinWith('homeinnResult H')

            ->select("H.id,
            H.question1,
            H.question2,H.result_number,
            H.question3,name,
            H.question4,phonenumber,
            H.question5,H.question6,
            H.final_id,
            from_unixtime(H.create_time) createtime")
            ->where(['between', 'H.create_time', $startime,$endtime])
            ->orderBy('H.create_time desc')
            ->asArray()
            ->all();

        return $feedback;
    }
}
