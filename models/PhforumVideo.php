<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phforum_video".
 *
 * @property integer $phforum_id
 * @property integer $video_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Phforum $phforum
 * @property Video $video
 */
class PhforumVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phforum_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phforum_id', 'video_id'], 'required'],
            [['phforum_id', 'video_id'], 'integer'],
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
            'video_id' => 'Video ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }
}
