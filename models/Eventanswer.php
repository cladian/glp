<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventanswer".
 *
 * @property integer $id
 * @property string $reply
 * @property integer $inscription_id
 * @property integer $eventquestion_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property Inscription $inscription
 * @property Eventquestion $eventquestion
 */
class Eventanswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventanswer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reply'], 'string'],
            [['inscription_id', 'eventquestion_id'], 'required'],
            [['inscription_id', 'eventquestion_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            ['created_at', 'default', 'value' => date('Y-m-d H:i:s')],
            ['updated_at', 'default', 'value' => date('Y-m-d H:i:s')]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reply' => 'Respuesta',
            'inscription_id' => 'Inscripción',
            'eventquestion_id' => 'Pregunta por Evento',
            'created_at' => 'Created At',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
            'status' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscription()
    {
        return $this->hasOne(Inscription::className(), ['id' => 'inscription_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventquestion()
    {
        return $this->hasOne(Eventquestion::className(), ['id' => 'eventquestion_id']);
    }
}
