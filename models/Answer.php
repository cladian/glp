<?php

namespace app\models;

use Yii;
use kartik\builder\Form;
use kartik\builder\TabularForm;
use yii\helpers\ArrayHelper;

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


    public function getGrid()
    {
        return [
            [
                'type' => Form::INPUT_RAW,
                'value'=>function ($model, $key, $index, $widget) {return $model->question->text; },
                'columnOptions'=>['width'=>'30%'],
                'label'=>'Preguntas requeridas para el evento'

            ],
            /*
                        'eventquestion_id' =>[

                            'type'=>TabularForm::INPUT_DROPDOWN_LIST,
                            'items'=>ArrayHelper::map(Eventquestion::find()->orderBy('text')->asArray()->all(), 'id', 'text'),
                            'columnOptions'=>['width'=>'50%'],
                            'options' => ['disabled' => true]


                        ],*/
            /*   'eventquestion_id' =>[


                   'value' => function ($data) {
                       return $data->getEventquestion()->text;
                   }
               ],*/
//            'eventquestion_id' => [
//                'type' => Form::INPUT_TEXTAREA,
//                /*'type' => Form::INPUT_STATIC,*/
//                'options' => ['placeholder' => 'Nombre'],
//              //  'value' => $this->evenquestion->text,
//
//            ],

            'reply' => [
                'type' => Form::INPUT_TEXTAREA,
                'options' => ['placeholder' => 'Descripción'],
                'columnOptions'=>['width'=>'200px;'],
            ],




        ];
    }
}
