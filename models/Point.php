<?php

namespace app\models;

use app\models\Language;
use app\models\City;

use yii\db\ActiveRecord;

/**
 * Point model
 *
 * @property int $pointId
 * @property string $macAddress
 * 
 */
class Point extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%point}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pointId'], 'integer'],
            [['macAddress'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pointId' => 'ID',
            'macAddress' => 'MAC-адрес',
        ];
    }

    public function getLanguage()
    {
        return $this->hasOne(Language::class, ['languageId' => 'languageId']);
    }

    public function getCity()
    {
        return $this->hasOne(City::class, ['cityId' => 'cityId']);
    }
}
