<?php

namespace app\api\modules\v1\actions;

class LanguageAction extends \yii\rest\ViewAction
{
    public function run($id = null, $key = null)
    {
        $point = $this->modelClass::findOne(['macAddress' => $key]);
        
        if ($point && $point->language->name) {
            return [
                'status' => 'ok',
                'result' => [
                    'macAddress' => $point->macAddress,
                    'cityId' => $point->languageId,
                    'cityName' => $point->language->name,
                ]
            ];
        }
        
        return [
            'status' => 'error',
            'result' => null,
        ];
    }
}    
