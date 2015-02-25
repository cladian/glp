<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscription".
 *
 * @property integer $id
 * @property integer $exposition
 * @property integer $service_terms
 * @property integer $complete
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $complete_logistic
 * @property integer $complete_eventquiz
 * @property integer $complete_quiz
 * @property integer $event_id
 * @property integer $user_id
 * @property integer $registertype_type
 * @property integer $registertype_assigment
 *
 * @property Answer[] $answers
 * @property Eventanswer[] $eventanswers
 * @property Event $event
 * @property User $user
 * @property Registertype $registertypeType
 * @property Registertype $registertypeAssigment
 * @property Logistic[] $logistics
 * @property Request[] $requests
 */
class Inscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exposition', 'service_terms', 'complete', 'status', 'complete_logistic', 'complete_eventquiz', 'complete_quiz', 'event_id', 'user_id', 'registertype_type', 'registertype_assigment'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['event_id', 'user_id', 'registertype_type', 'registertype_assigment'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'exposition' => 'Exposition',
            'service_terms' => 'Service Terms',
            'complete' => 'Complete',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'complete_logistic' => 'Complete Logistic',
            'complete_eventquiz' => 'Complete Eventquiz',
            'complete_quiz' => 'Complete Quiz',
            'event_id' => 'Event ID',
            'user_id' => 'User ID',
            'registertype_type' => 'Registertype Type',
            'registertype_assigment' => 'Registertype Assigment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['inscription_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventanswers()
    {
        return $this->hasMany(Eventanswer::className(), ['inscription_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistertypeType()
    {
        return $this->hasOne(Registertype::className(), ['id' => 'registertype_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistertypeAssigment()
    {
        return $this->hasOne(Registertype::className(), ['id' => 'registertype_assigment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogistics()
    {
        return $this->hasMany(Logistic::className(), ['inscription_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['inscription_id' => 'id']);
    }
}
