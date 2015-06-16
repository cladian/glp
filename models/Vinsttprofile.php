<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vinsttprofile".
 *
 * @property string $name
 * @property integer $cresp
 * @property integer $event_id
 */
class Vinsttprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vinsttprofile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'event_id'], 'required'],
            [['cresp', 'event_id'], 'integer'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'cresp' => 'Cresp',
            'event_id' => 'Event ID',
        ];
    }
}
