<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_video".
 *
 * @property integer $post_id
 * @property integer $video_id
 *
 * @property Post $post
 * @property Video $video
 */
class PostVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'video_id'], 'required'],
            [['post_id', 'video_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'video_id' => 'Video ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }
}
