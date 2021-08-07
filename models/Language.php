<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Language model
 *
 * @property int $languageId
 * @property string $name
 * 
 */
class Language extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%language}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['languageId'], 'integer'],
            [['name'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'languageId' => 'ID',
            'name' => 'Название',
        ];
    }
}
