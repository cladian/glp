<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Topic */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="regresar">

    <?= Html::a(\Yii::$app->params['btnRegresar'],['/phforum/view','id' => $model->phforum_id], ['class' => 'btn btn-default'])?>

</div>
<div class="panel panel-green">
    <div class="panel-heading"> Crear Tema</div>
    <div class="panel-body">
<div class="topic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
