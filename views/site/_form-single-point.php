<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;

$languageitems = ArrayHelper::map($languages, 'languageId', 'name');
$languageParams = ['prompt' => 'Выберите язык'];
?>

<div style="height: 70px;"></div>

<?php $form = ActiveForm::begin([
    'id' => 'single-point-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]);


echo $form->field($formModel, 'macAddress')->widget(\yii\widgets\MaskedInput::class, [
    'mask' => '**-**-**-**-**-**',
]);

$items = ArrayHelper::map($languages, 'languageId', 'name');
    $params = [
        'prompt' => 'Выберите язык'
    ];
echo $form->field($formModel, 'languageId')->dropDownList($items,$params);

?>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    </div>
</div>
<?php

ActiveForm::end(); ?>

<div style="height: 50px;"></div>