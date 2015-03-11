<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phforum_imagen".
 *
 * @property integer $phforum_id
 * @property integer $imagen_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Imagen $imagen
 * @property Phforum $phforum
 */
class PhforumImagen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phforum_imagen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phforum_id', 'imagen_id'], 'required'],
            [['phforum_id', 'imagen_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phforum_id' => 'Phforum ID',
            'imagen_id' => 'Imagen ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagen()
    {
        return $this->hasOne(Imagen::className(), ['id' => 'imagen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforum()
    {
        return $this->hasOne(Phforum::className(), ['id' => 'phforum_id']);
    }
}
