<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * SinglePointForm is the model behind the point form.
 */
class SinglePointForm extends Model
{
    public $languageId;
    public $macAddress;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['languageId', 'macAddress'], 'required', 'message' => 'Обязательное поле'],
            [['macAddress'], 'string', 'length' => 17,],
        ];
    }

    public function attributeLabels()
    {
        return [
            'languageId' => 'Язык',
            'macAddress' => 'MAC-адрес',
        ];
    }
}
