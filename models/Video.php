<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property string $name
 * @property string $ulr
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PhforumVideo[] $phforumVideos
 * @property Phforum[] $phforums
 * @property PostVideo[] $postVideos
 * @property Post[] $posts
 * @property TopicVideo[] $topicVideos
 * @property Topic[] $topics
 */
class Video extends \yii\db\ActiveRecord
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
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ulr'], 'string'],
            [['ulr'], 'url'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 250],
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
            'name' => 'Nombre',
            'ulr' => 'Enlace del Video',
            'status' => 'Estado',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforumVideos()
    {
        return $this->hasMany(PhforumVideo::className(), ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforums()
    {
        return $this->hasMany(Phforum::className(), ['id' => 'phforum_id'])->viaTable('phforum_video', ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostVideos()
    {
        return $this->hasMany(PostVideo::className(), ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('post_video', ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopicVideos()
    {
        return $this->hasMany(TopicVideo::className(), ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['id' => 'topic_id'])->viaTable('topic_video', ['video_id' => 'id']);
    }
}
