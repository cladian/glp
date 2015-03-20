<?php

namespace app\models;

use Yii;
// BUILD FORM
use kartik\builder\Form;
use kartik\builder\TabularForm;
use yii\helpers\ArrayHelper;

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
    public function getGrid()
    {
        return [
            [
                'type' => Form::INPUT_RAW,
                'value'=>function ($model, $key, $index, $widget) {return '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>'.$model->eventquestion->text; },
                'columnOptions'=>['width'=>'50%'],

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
                'options' => ['placeholder' => 'Descripción']
            ],




        ];
    }
}
