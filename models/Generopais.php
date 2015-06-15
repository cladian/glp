<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generopais".
 *
 * @property string $gender
 * @property integer $cgender
 * @property string $iso
 * @property integer $ciso
 * @property integer $event_id
 */
class Generopais extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'generopais';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender'], 'string'],
            [['cgender', 'ciso', 'event_id'], 'integer'],
            [['event_id'], 'required'],
            [['iso'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gender' => 'Gender',
            'cgender' => 'Cgender',
            'iso' => 'Iso',
            'ciso' => 'Ciso',
            'event_id' => 'Event ID',
        ];
    }
}
