<?php

namespace app\api\modules\v1\models;

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

    public function getLanguage()
    {
        return $this->hasOne(Language::class, ['languageId' => 'languageId']);
    }

    public function getCity()
    {
        return $this->hasOne(City::class, ['cityId' => 'cityId']);
    }
}
