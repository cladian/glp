<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $text
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $type
 *
 * @property Eventquestion[] $eventquestions
 * @property Generalquestion[] $generalquestions
 */
class Question extends \yii\db\ActiveRecord
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
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'type'], 'string'],
            [['status'], 'integer'],
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
            'text' => 'Texto',
            'status' => 'Estado',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
            'type' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventquestions()
    {
        return $this->hasMany(Eventquestion::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralquestions()
    {
        return $this->hasMany(Generalquestion::className(), ['question_id' => 'id']);
    }
}
