<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Eventtype;
use app\models\Question;

/* @var $this yii\web\View */
/* @var $model app\models\Eventquestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eventquestion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?/*= $form->field($model, 'status')->textInput() */?>
    <?= $form->field($model, 'status')->dropDownList([ '10' => 'Activo','0' => 'Inactivo'], [ 'prompt' => 'Seleccionar']) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <!--    --><?//= $form->field($model, 'eventtype_id')->textInput() ?>
    <?=
    $form->field($model, 'eventtype_id')->dropDownList(
        ArrayHelper::map(Eventtype::find()->all(), 'id', 'name'),
        ['disabled'=> 'disabled']
    ) ?>

<!--    --><?//= $form->field($model, 'question_id')->textInput() ?>

    <?=
    $form->field($model, 'question_id')->dropDownList(
        ArrayHelper::map(Question::find()->all(), 'id', 'text'),
        ['prompt' => 'Seleccione']

    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
