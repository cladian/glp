<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "topic_video".
 *
 * @property integer $topic_id
 * @property integer $video_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Topic $topic
 * @property Video $video
 */
class TopicVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topic_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic_id', 'video_id'], 'required'],
            [['topic_id', 'video_id'], 'integer'],
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
            'video_id' => 'Video ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(Topic::className(), ['id' => 'topic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }
}
