<?php

namespace app\api\modules\v1\actions;

class ViewAction extends \yii\rest\ViewAction
{
    public function run($key = null)
    {
        $point = $this->modelClass::findOne(['macAddress' => $key]);
        
        if ($point && $point->language->name && $point->city->name) {
            return [
                'status' => 'ok',
                'result' => [
                    'pointId' => $point->pointId,
                    'macAddress' => $point->macAddress,
                    'languageId' => $point->languageId,
                    'languageName' => $point->language->name,
                    'cityId' => $point->cityId,
                    'cityName' => $point->city->name,
                ]
            ];
        } 

        return [
            'status' => 'error',
            'result' => null,
        ];
    }
}    
