<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_imagen".
 *
 * @property integer $post_id
 * @property integer $imagen_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Imagen $imagen
 * @property Post $post
 */
class PostImagen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_imagen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'imagen_id'], 'required'],
            [['post_id', 'imagen_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
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
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}
