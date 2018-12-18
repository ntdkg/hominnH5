<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "tbl_homeinn_question_and_answer".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 */
class HomeinnQuestionAndAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_homeinn_question_and_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'answer'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
        ];
    }


    public static function getAllQuestionAndAnswer(){
        $data=static ::find()
            ->asArray()
            ->all();
        return $data;
    }

}
