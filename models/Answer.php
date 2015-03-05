<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property integer $id
 * @property integer $inscription_id
 * @property integer $question_id
 * @property string $reply
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property Inscription $inscription
 * @property Generalquestion $question
 */
class Answer extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inscription_id', 'question_id'], 'required'],
            [['inscription_id', 'question_id', 'status'], 'integer'],
            [['reply'], 'string'],
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
//            'id' => 'ID',
            'inscription_id' => 'Inscripción',
            'question_id' => 'Pregunta',
            'reply' => 'Respuesta',
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
    public function getQuestion()
    {
        return $this->hasOne(Generalquestion::className(), ['id' => 'question_id']);
    }
}
