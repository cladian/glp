<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logistic".
 *
 * @property integer $id
 * @property integer $inscription_id
 * @property string $leavingonorigincity
 * @property string $leavingonairline
 * @property string $leavingonflightnumber
 * @property string $leavingondate
 * @property string $leavingonhour
 * @property string $returningonairline
 * @property string $returningonflightnumber
 * @property string $returningondate
 * @property string $returningonhour
 * @property integer $residence
 * @property string $residenceobs
 * @property string $accommodationdatein
 * @property string $accommodationdateout
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Inscription $inscription
 */
class Logistic extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logistic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inscription_id'], 'required'],
            [['inscription_id', 'residence', 'status'], 'integer'],
            [['leavingondate', 'leavingonhour', 'returningondate', 'returningonhour', 'accommodationdatein', 'accommodationdateout', 'created_at', 'updated_at'], 'safe'],
            [['residenceobs'], 'string'],
            [['leavingonorigincity', 'leavingonairline', 'returningonairline'], 'string', 'max' => 45],
            [['leavingonflightnumber', 'returningonflightnumber'], 'string', 'max' => 10],
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
            'inscription_id' => 'ID',
            'leavingonorigincity' => 'Ciudad de procedencia',
            'leavingonairline' => 'Aerolinea',
            'leavingonflightnumber' => '# Vuelo',
            'leavingondate' => 'Fecha de arribo',
            'leavingonhour' => 'Hora de Arribo',

            'returningonairline' => 'Aerolinea',
            'returningonflightnumber' => '# Vuelo',
            'returningondate' => 'Fecha de retorno',
            'returningonhour' => 'Hora de retorno',

            'residence' => '¿Reside en la ciudad del evento?',
            'residenceobs' => 'Residenceobs',
            'accommodationdatein' => 'Fecha de inicio de alojamiento',
            'accommodationdateout' => 'Fecha de salida de alojamiento',
            'status' => 'Estado',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscription()
    {
        return $this->hasOne(Inscription::className(), ['id' => 'inscription_id']);
    }
}
