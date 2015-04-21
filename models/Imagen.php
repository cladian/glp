<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Imagen".
 *
 * @property integer $id
 * @property string $name
 * @property string $file
 * @property string $tags
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PhforumImagen[] $phforumImagens
 * @property Phforum[] $phforums
 * @property PhforumImages[] $phforumImages
 * @property PostImagen[] $postImagens
 * @property Post[] $posts
 * @property TopicImagen[] $topicImagens
 * @property Topic[] $topics
 */
class Imagen extends \yii\db\ActiveRecord
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
        return 'imagen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['file', 'tags'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 250],
            ['created_at', 'default', 'value' => date('Y-m-d H:i:s')],
            ['updated_at', 'default', 'value' => date('Y-m-d H:i:s')],
            [['file'], 'file', 'extensions'=>'jpg, png, gif, jpeg'],
            [['file'], 'required','on'=>'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'file' => 'Archivo',
            'tags' => 'Tags',
            'status' => 'Estado',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforumImagens()
    {
        return $this->hasMany(PhforumImagen::className(), ['imagen_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforums()
    {
        return $this->hasMany(Phforum::className(), ['id' => 'phforum_id'])->viaTable('phforum_images', ['images_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforumImages()
    {
        return $this->hasMany(PhforumImages::className(), ['images_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostImagens()
    {
        return $this->hasMany(PostImagen::className(), ['imagen_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('post_imagen', ['imagen_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopicImagens()
    {
        return $this->hasMany(TopicImagen::className(), ['imagen_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['id' => 'topic_id'])->viaTable('topic_imagen', ['imagen_id' => 'id']);
    }
}
