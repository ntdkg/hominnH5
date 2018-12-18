<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "tbl_homeinn_channel".
 *
 * @property int $id
 * @property string $params
 */
class HomeinnChannel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_homeinn_channel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['params'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'params' => 'Params',
        ];
    }
    public static function saveChannel($params){

        $model = new static();

        $model->params=$params['params'];

        if (!$model->save()) {
            return false;
        }else{
            return true;
        }

    }
}
