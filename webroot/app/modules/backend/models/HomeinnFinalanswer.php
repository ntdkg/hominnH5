<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "tbl_homeinn_finalanswer".
 *
 * @property int $id
 * @property string $final
 */
class HomeinnFinalanswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_homeinn_finalanswer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['final'], 'string'],
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
            'final' => 'Final',
        ];
    }
}
