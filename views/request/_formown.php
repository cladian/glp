<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Inscription;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-green">
  <div class="panel-heading">Crear Solicitudes</div>
  <div class="panel-body">
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>
<!--    --><?//= $form->field($model, 'status')->dropDownList(['10' => 'Activo', '0' => 'Inactivo'], ['prompt' => 'Seleccionar']) ?>
<!--    --><?//= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'inscription_id')->textInput() ?>
<!--    --><?//=
//    $form->field($model, 'inscription_id')->dropDownList(
//        ArrayHelper::map(Inscription::find()->all(), 'id', 'id'),
//        ['prompt' => 'Seleccione']
//    ) ?>
  </div>
</div>
<div class="request-form">


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnCrear'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
