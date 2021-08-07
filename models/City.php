<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * City model
 *
 * @property int $cityId
 * @property string $name
 * 
 */
class City extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%city}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cityId'], 'integer'],
            [['name'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cityId' => 'ID',
            'name' => 'Название',
        ];
    }
}
