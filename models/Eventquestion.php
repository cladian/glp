<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventquestion".
 *
 * @property integer $id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $eventtype_id
 * @property integer $question_id
 *
 * @property Eventanswer[] $eventanswers
 * @property Eventtype $eventtype
 * @property Question $question
 */
class Eventquestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventquestion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'eventtype_id', 'question_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['eventtype_id', 'question_id'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'eventtype_id' => 'Eventtype ID',
            'question_id' => 'Question ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventanswers()
    {
        return $this->hasMany(Eventanswer::className(), ['eventquestion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventtype()
    {
        return $this->hasOne(Eventtype::className(), ['id' => 'eventtype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }
}
