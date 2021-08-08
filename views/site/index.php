<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Моё тестовое задание';
?>
<div class="site-index">
    <div class="">
        <p class="lead">Изменить язык</p>
        
        <?= Tabs::widget([
            'items' => [
                [
                    'label' => 'Для одной точки',
                    'content' => $this->render('_form-single-point', [
                        'formModel' => $formModels['singlePointForm'],
                        'languages' =>  $languages,
                        'cities' => $cities,
                    ], false, true),
                ],
                [
                    'label' => 'Для всего города',
                    'content' => $this->render('_form-city-points', [
                        'formModel' => $formModels['cityPointsForm'],
                        'languages' =>  $languages,
                        'cities' => $cities,
                    ], false, true),
                ],
                [
                    'label' => 'Для всех',
                    'content' => $this->render('_form-all-points', [
                        'formModel' => $formModels['allPointsForm'],
                        'languages' =>  $languages,
                        'cities' => $cities,
                    ], false, true),
                ],
            ]
        ]) ?>
    </div>
</div>

<div class="product-index box box-primary">
    <?php Pjax::begin(); ?>
    
    <div class="box-body table-responsive no-padding">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                'pointId',
                'macAddress',
                ['attribute' => 'cityName','label' => 'Город', 'value'=>'city.name'],
                ['attribute' => 'languageName','label' => 'Язык', 'value'=>'language.name'],
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php
    Pjax::end(); ?>
</div>

<?php
/**
 * Скрипт для запоминания и восстановления активной вкладки таба при перезагрузке
 * Источник https://github.com/yiisoft/yii2/issues/4890#issuecomment-171689468 
 */
$script = <<< JS
    $(function() {
        //save the latest tab (http://stackoverflow.com/a/18845441)
        $('a[data-toggle="tab"]').on('click', function (e) {
            localStorage.setItem('lastTab', $(e.target).attr('href'));
        });

        //go to the latest tab, if it exists:
        var lastTab = localStorage.getItem('lastTab');

        if (lastTab) {
            $('a[href="'+lastTab+'"]').click();
        }
    });
JS;
$this->registerJs($script, yii\web\View::POS_END);
?>
