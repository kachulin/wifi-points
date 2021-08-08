<?php

namespace app\api\modules\v1\actions;

class CityAction extends \yii\rest\ViewAction
{
    public function run($key = null)
    {
        $point = $this->modelClass::findOne(['macAddress' => $key]);
        
        if ($point && $point->city->name) {
            return [
                'status' => 'ok',
                'result' => [
                    'macAddress' => $point->macAddress,
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
