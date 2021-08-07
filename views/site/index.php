<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Моё тестовое задание';
?>
<div class="site-index">

    <div class="jumbotron">
        <p class="lead"></p>
    </div>
</div>

<div class="product-index box box-primary">
    <?php Pjax::begin(); ?>
    <!--
    <div class="box-header with-border">
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    -->
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                'pointId',
                'macAddress',
                ['attribute' => 'cityName','label' => 'Город', 'value'=>'city.name'],
                ['attribute' => 'languageName','label' => 'Язык', 'value'=>'language.name'],
                ['class' => 'yii\grid\ActionColumn'],
            ],
                             ]
        ); ?>
    </div>
    <?php
    Pjax::end(); ?>
</div>
