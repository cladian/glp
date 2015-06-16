<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userphforum".
 *
 * @property integer $phforum_id
 * @property integer $user_id
 * @property string $observation
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property Phforum $phforum
 * @property User $user
 */
class Userphforum extends \yii\db\ActiveRecord
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
    public static function tableName()
    {
        return 'userphforum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phforum_id', 'user_id'], 'required'],
            [['phforum_id', 'user_id', 'status'], 'integer'],
            [['observation'], 'string'],
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
            'phforum_id' => 'Foro ID',
            'user_id' => 'Usuario ID',
            'observation' => 'Observaciones',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
            'status' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforum()
    {
        return $this->hasOne(Phforum::className(), ['id' => 'phforum_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
