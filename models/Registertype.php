<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registertype".
 *
 * @property integer $id
 * @property string $name
 * @property string $role
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $registertype_id
 *
 * @property Inscription[] $inscriptions
 * @property Registertype $registertype
 * @property Registertype[] $registertypes
 */
class Registertype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registertype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'registertype_id'], 'required'],
            [['role'], 'string'],
            [['status', 'registertype_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'registertype_id' => 'Registertype ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscriptions()
    {
        return $this->hasMany(Inscription::className(), ['registertype_assigment' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistertype()
    {
        return $this->hasOne(Registertype::className(), ['id' => 'registertype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistertypes()
    {
        return $this->hasMany(Registertype::className(), ['registertype_id' => 'id']);
    }
}
