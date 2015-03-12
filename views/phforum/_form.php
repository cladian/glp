<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use app\models\Event;

/* @var $this yii\web\View */
/* @var $model app\models\Phforum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phforum-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 250]) ?>

<!-- --><?//= $form->field($model, 'begin_at')->textInput() ?>


    <?= $form->field($model, 'begin_at')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Fecha'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'readonly' => true,
            'disabled' => true,
        ]
    ]);
    ?>

<!--    --><?//= $form->field($model, 'end_at')->textInput() ?>
    <?= $form->field($model, 'end_at')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Fecha'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'readonly' => true,
            'disabled' => true,
        ]
    ]);
    ?>

<!--    --><?//= $form->field($model, 'meeting_at')->textInput() ?>
    <?= $form->field($model, 'meeting_at')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Fecha'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'readonly' => true,
            'disabled' => true,
        ]
    ]);
    ?>

<!--    --><?//= $form->field($model, 'memory_at')->textInput() ?>
    <?= $form->field($model, 'memory_at')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Fecha'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'readonly' => true,
            'disabled' => true,
        ]
    ]);
    ?>


    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'topic_number')->textInput() ?>

<!--    --><?//= $form->field($model, 'event_id')->textInput() ?>

    <?=
    $form->field($model, 'event_id')->dropDownList(
        ArrayHelper::map(Event::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) ?>


<!--    --><?//= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList([ '10' => 'Activo','0' => 'Inactivo']) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'is_private')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList([ '10' => 'Activo','0' => 'Inactivo'], [ 'prompt' => 'Seleccionar']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
