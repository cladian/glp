<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventtype".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property string $created_at
 * @property string $update_at
 *
 * @property Event[] $events
 * @property Eventquestion[] $eventquestions
 */
class Eventtype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventtype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['eventtype_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventquestions()
    {
        return $this->hasMany(Eventquestion::className(), ['eventtype_id' => 'id']);
    }
}
