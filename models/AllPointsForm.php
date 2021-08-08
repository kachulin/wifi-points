<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * AllPointsForm is the model behind the point form.
 */
class AllPointsForm extends Model
{
    public $languageId;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['languageId'], 'required', 'message' => 'Обязательное поле'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'languageId' => 'Язык',
        ];
    }
}
