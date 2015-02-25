<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\ColorInput;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 45]) ?>

    <?/*= $form->field($model, 'color')->textInput(['maxlength' => 45]) */?>

    <?= $form->field($model, 'color')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Selecionar color ...'],]);  ?>

    <?= $form->field($model, 'iso')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'phonecode')->textInput(['maxlength' => 45]) ?>

    <?/*= $form->field($model, 'status')->textInput() */?>
    <?= $form->field($model, 'status')->dropDownList([ '10' => 'Activo','0' => 'Inactivo'], [ 'prompt' => 'Seleccionar']) ?>

    <?/*= $form->field($model, 'created_at')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd'
        ]
    ]);
    */?>
    <?/*= $form->field($model, 'created_at')->textInput() */?><!--

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
