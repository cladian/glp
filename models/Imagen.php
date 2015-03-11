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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Imagen';
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
            [['name'], 'string', 'max' => 250]
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
            'file' => 'File',
            'tags' => 'Tags',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
