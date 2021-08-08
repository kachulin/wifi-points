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
 * @property int $languageId
 * @property int $cityId
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
            [['pointId', 'languageId', 'cityId'], 'integer'],
            [['macAddress'], 'string', 'max' => 17],
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
            'languageId' => 'ID языка',
            'cityId' => 'ID города',
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
