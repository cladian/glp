<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $iso
 * @property string $color
 * @property string $phone_code
 * @property integer $status
 * @property string $rdate
 * @property string $update
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['rdate', 'update'], 'safe'],
            [['name', 'color', 'phone_code'], 'string', 'max' => 45],
            [['iso'], 'string', 'max' => 3]
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
            'description' => 'Description',
            'iso' => 'Iso',
            'color' => 'Color',
            'phone_code' => 'Phone Code',
            'status' => 'Status',
            'rdate' => 'Rdate',
            'update' => 'Update',
        ];
    }
}
