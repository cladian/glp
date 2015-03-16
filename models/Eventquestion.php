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
 * @property string $text
 *
 * @property Eventanswer[] $eventanswers
 * @property Eventtype $eventtype
 * @property Question $question
 */
class Eventquestion extends \yii\db\ActiveRecord
{
    // CONTROL DE ESTADOS
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public function getStatus($status)
    {
        $codes = $this->getStatusList();
        return (    isset($codes[$status])) ? $codes[$status] : '';
    }

    public function getStatusList()
    {
        return $codes = [
            self::STATUS_ACTIVE => 'ACTIVO',
            self::STATUS_INACTIVE => 'INACTIVO',
            self::STATUS_DELETED => 'ELIMINADO',
        ];

    }
    //---> ESTADOS
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
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'event_id'], 'integer'],
            [['text'], 'string'],
            ['created_at', 'default', 'value' => date('Y-m-d H:i:s')],
            ['updated_at', 'default', 'value' => date('Y-m-d H:i:s')],
            [['event_id'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Estado',
            'text' => 'Text',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
            'event_id' => 'Evento',
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
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

}
