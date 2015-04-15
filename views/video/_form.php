<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancelar'], ['view', 'id' => $id], ['class' => 'btn btn-danger']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<div class="video-form">


    <?= $form->field($model, 'name')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'ulr')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>


</div>
<?php ActiveForm::end(); ?>
