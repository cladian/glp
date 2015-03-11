<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phforum_document".
 *
 * @property integer $phforum_id
 * @property integer $document_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Document $document
 * @property Phforum $phforum
 */
class PhforumDocument extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phforum_document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phforum_id', 'document_id'], 'required'],
            [['phforum_id', 'document_id'], 'integer'],
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
            'document_id' => 'Document ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(Document::className(), ['id' => 'document_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhforum()
    {
        return $this->hasOne(Phforum::className(), ['id' => 'phforum_id']);
    }
}
