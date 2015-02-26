<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscription-form">

    <?php $form = ActiveForm::begin(); ?>



    <?/*= $form->field($model, 'complete')->textInput() */?>

    <?/*= $form->field($model, 'status')->textInput() */?>

<!--    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

<!--    <?/*= $form->field($model, 'complete_logistic')->textInput() */?>

    <?/*= $form->field($model, 'complete_eventquiz')->textInput() */?>

    --><?/*= $form->field($model, 'complete_quiz')->textInput() */?>

    <?= $form->field($model, 'event_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>
    <div class="col-sm-6">

    <?= $form->field($model, 'registertype_type')->textInput() ?>
</div>
    <div class="col-sm-6">
    <?= $form->field($model, 'registertype_assigment')->textInput() ?>
</div>
    <div class="col-sm-6">
        <?=  $form->field($model, 'exposition')->widget(SwitchInput::classname(), [
            'pluginOptions' => [
                'onText' => 'SI',
                'offText' => 'NO',
            ]
        ]);?>
    </div>

    <div class="col-sm-6">
        <?=  $form->field($model, 'service_terms')->widget(SwitchInput::classname(), [
            'pluginOptions' => [
                'onText' => 'SI',
                'offText' => 'NO',
            ]
        ]);?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>