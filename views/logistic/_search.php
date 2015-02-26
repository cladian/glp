<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LogisticSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logistic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'inscription_id') ?>

    <?= $form->field($model, 'leavingonorigincity') ?>

    <?= $form->field($model, 'leavingonairline') ?>

    <?= $form->field($model, 'leavingonflightnumber') ?>

    <?php // echo $form->field($model, 'leavingondate') ?>

    <?php // echo $form->field($model, 'leavingonhour') ?>

    <?php // echo $form->field($model, 'returningonairline') ?>

    <?php // echo $form->field($model, 'returningonflightnumber') ?>

    <?php // echo $form->field($model, 'returningondate') ?>

    <?php // echo $form->field($model, 'returningonhour') ?>

    <?php // echo $form->field($model, 'residence') ?>

    <?php // echo $form->field($model, 'residenceobs') ?>

    <?php // echo $form->field($model, 'accommodationdatein') ?>

    <?php // echo $form->field($model, 'accommodationdateout') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
