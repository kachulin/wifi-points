<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * CityPointsForm is the model behind the point form.
 */
class CityPointsForm extends Model
{
    public $languageId;
    public $cityId;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['languageId', 'cityId'], 'required', 'message' => 'Обязательное поле'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'languageId' => 'Язык',
            'cityId' => 'Город',
        ];
    }
}
