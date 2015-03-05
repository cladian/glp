<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reply".
 *
 * @property integer $user_id
 * @property integer $request_id
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property Request $request
 * @property User $user
 */
class Reply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'request_id'], 'required'],
            [['user_id', 'request_id', 'status'], 'integer'],
            [['text'], 'string'],
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
            'user_id' => 'Usuario',
            'request_id' => 'Solicitud',
            'text' => 'Text',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
            'status' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
