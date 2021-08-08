<?php
namespace app\api\modules\v1\controllers;

use yii\rest\ActiveController;

class PointController extends ActiveController
{
    // We are using the regular web app modules:
    public $modelClass = 'app\api\modules\v1\models\Point';
    
    public function actions() {
        return array_merge(parent::actions(), [
            'view' => [
                'class' => \app\api\modules\v1\actions\ViewAction::class,
                'modelClass' => $this->modelClass,
            ],
            'language' => [
                'class' => \app\api\modules\v1\actions\LanguageAction::class,
                'modelClass' => $this->modelClass,
            ],
            'city' => [
                'class' => \app\api\modules\v1\actions\CityAction::class,
                'modelClass' => $this->modelClass,
            ],
        ]);
    }
}
