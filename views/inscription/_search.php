<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InscriptionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscription-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'exposition') ?>

    <?= $form->field($model, 'service_terms') ?>

    <?= $form->field($model, 'complete') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'complete_logistic') ?>

    <?php // echo $form->field($model, 'complete_eventquiz') ?>

    <?php // echo $form->field($model, 'complete_quiz') ?>

    <?php // echo $form->field($model, 'event_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'registertype_type') ?>

    <?php // echo $form->field($model, 'registertype_assigment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
