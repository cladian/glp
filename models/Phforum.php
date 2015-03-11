<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phforum".
 *
 * @property integer $id
 * @property string $name
 * @property string $begin_at
 * @property string $end_at
 * @property string $meeting_at
 * @property string $memory_at
 * @property string $content
 * @property integer $topic_number
 * @property integer $event_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_private
 *
 * @property Event $event
 * @property PhforumDocument[] $phforumDocuments
 * @property Document[] $documents
 * @property PhforumImagen[] $phforumImagens
 * @property Imagen[] $imagens
 * @property PhforumImages[] $phforumImages
 * @property Imagen[] $images
 * @property PhforumVideo[] $phforumVideos
 * @property Video[] $videos
 * @property Topic[] $topics
 */
class Phforum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phforum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'event_id'], 'required'],
            [['begin_at', 'end_at', 'meeting_at', 'memory_at', 'created_at', 'updated_at'], 'safe'],
            [['content'], 'string'],
            [['topic_number', 'event_id', 'status', 'is_private'], 'integer'],
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
            'begin_at' => 'Begin At',
            'end_at' => 'End At',
            'meeting_at' => 'Meeting At',
            'memory_at' => 'Memory At',
            'content' => 'Content',
            'topic_number' => 'Topic Number',
            'event_id' => 'Event ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_private' => 'Is Private',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforumDocuments()
    {
        return $this->hasMany(PhforumDocument::className(), ['phforum_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['id' => 'document_id'])->viaTable('phforum_document', ['phforum_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforumImagens()
    {
        return $this->hasMany(PhforumImagen::className(), ['phforum_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagens()
    {
        return $this->hasMany(Imagen::className(), ['id' => 'imagen_id'])->viaTable('phforum_imagen', ['phforum_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforumImages()
    {
        return $this->hasMany(PhforumImages::className(), ['phforum_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Imagen::className(), ['id' => 'images_id'])->viaTable('phforum_images', ['phforum_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforumVideos()
    {
        return $this->hasMany(PhforumVideo::className(), ['phforum_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['id' => 'video_id'])->viaTable('phforum_video', ['phforum_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['phforum_id' => 'id']);
    }
}
