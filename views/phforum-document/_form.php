<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhforumDocument */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="class breadcrumb">

    <?= Html::a(\Yii::$app->params['btnCancelar'], ['/phforum/index'], ['class' => 'btn btn-danger']) ?>
    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
    <div class="panel panel-green">
        <div class="panel-heading">Actualización </div>
        <div class="panel-body">

<div class="phforum-document-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'phforum_id')->textInput() ?>

    <?= $form->field($model, 'document_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnCrear'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>

