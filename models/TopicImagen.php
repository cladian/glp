<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "topic_imagen".
 *
 * @property integer $topic_id
 * @property integer $imagen_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Imagen $imagen
 * @property Topic $topic
 */
class TopicImagen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topic_imagen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic_id', 'imagen_id'], 'required'],
            [['topic_id', 'imagen_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'topic_id' => 'Topic ID',
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
    public function getTopic()
    {
        return $this->hasOne(Topic::className(), ['id' => 'topic_id']);
    }
}
