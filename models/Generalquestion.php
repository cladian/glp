<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generalquestion".
 *
 * @property integer $id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $question_id
 * @property string $text
 * @property Answer[] $answers
 * @property Question $question
 */
class Generalquestion extends \yii\db\ActiveRecord
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
        return 'generalquestion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'question_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['question_id'], 'required'],
            [['text'], 'string'],
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
            'status' => 'Estado',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
            'question_id' => 'Preguntas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
/*    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }*/
}
