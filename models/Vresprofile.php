<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vresprofile".
 *
 * @property string $name
 * @property integer $cresp
 * @property integer $event_id
 */
class Vresprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vresprofile';
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
