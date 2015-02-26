<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'text')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'es',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap  preview anchor",


            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
        ]
    ]);?>

    <?/*= $form->field($model, 'status')->textInput() */?>
    <?= $form->field($model, 'status')->dropDownList([ '10' => 'Activo','0' => 'Inactivo'], [ 'prompt' => 'Seleccionar']) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'EVENTO' => 'EVENTO', 'GENERAL' => 'GENERAL', ], ['prompt' => 'Selecionar']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
