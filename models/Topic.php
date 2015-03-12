<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "topic".
 *
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 * @property integer $phforum_id
 *
 * @property Post[] $posts
 * @property Phforum $phforum
 * @property User $user
 * @property TopicDocument[] $topicDocuments
 * @property Document[] $documents
 * @property TopicImagen[] $topicImagens
 * @property Imagen[] $imagens
 * @property TopicVideo[] $topicVideos
 * @property Video[] $videos
 */
class Topic extends \yii\db\ActiveRecord
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
        return 'topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['status', 'user_id', 'phforum_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id', 'phforum_id'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'phforum_id' => 'Phforum ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['topic_id' => 'id']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopicDocuments()
    {
        return $this->hasMany(TopicDocument::className(), ['topic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['id' => 'document_id'])->viaTable('topic_document', ['topic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopicImagens()
    {
        return $this->hasMany(TopicImagen::className(), ['topic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagens()
    {
        return $this->hasMany(Imagen::className(), ['id' => 'imagen_id'])->viaTable('topic_imagen', ['topic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopicVideos()
    {
        return $this->hasMany(TopicVideo::className(), ['topic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['id' => 'video_id'])->viaTable('topic_video', ['topic_id' => 'id']);
    }
}
