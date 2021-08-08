<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$languageItems = ArrayHelper::map($languages, 'languageId', 'name');
$languageParams = ['prompt' => 'Выберите язык'];
?>
<div style="height: 70px;"></div>
<?php $form = ActiveForm::begin([
    'id' => 'all-points-form',
    'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]) ?>

    <?= $form->field($formModel, 'languageId')->dropDownList($languageItems,$languageParams) ?>
    
    <div class="form-group col">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<div style="height: 50px;"></div>

