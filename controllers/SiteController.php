<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Point;
use app\models\PointSearch;
use app\models\Language;
use app\models\City;
use app\models\SinglePointForm;
use app\models\CityPointsForm;
use app\models\AllPointsForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }

        $productQueryParams = [];
        if (Yii::$app->request->queryParams) {
            $productQueryParams = Yii::$app->request->queryParams;
        }

        $formModels = [
            'singlePointForm' => new SinglePointForm(),
            'cityPointsForm' => new CityPointsForm(),
            'allPointsForm' => new AllPointsForm(),
        ];

        if ($formModels['singlePointForm']->load(Yii::$app->request->post()) && $formModels['singlePointForm']->validate()) {
            $languageId = Yii::$app->request->post('SinglePointForm')['languageId'];
            $macAddress = Yii::$app->request->post('SinglePointForm')['macAddress'];
            
            $point = Point::findOne(['macAddress' => $macAddress]);
            if ($point) {
                $point->languageId = (int)$languageId;
                $point->update(false);
            }
        }

        if ($formModels['cityPointsForm']->load(Yii::$app->request->post()) && $formModels['cityPointsForm']->validate()) {
            $languageId = Yii::$app->request->post('CityPointsForm')['languageId'];
            $cityId = Yii::$app->request->post('CityPointsForm')['cityId'];
            
            Point::updateAll(['languageId' => $languageId], 'cityId = ' . $cityId);
        }

        if ($formModels['allPointsForm']->load(Yii::$app->request->post()) && $formModels['allPointsForm']->validate()) {
            $languageId = Yii::$app->request->post('AllPointsForm')['languageId'];
            
            Point::updateAll(['languageId' => $languageId]);
        }

        $searchModel = new PointSearch();
        $dataProvider = $searchModel->search($productQueryParams);

        $languages = Language::find()->all();
        $cities = City::find()->all();

        return $this->render('index', [
            'formModels' => $formModels,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'languages' =>  $languages,
            'cities' => $cities,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
