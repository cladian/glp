<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancel'], [ '/user/index', 'id'=>$model->id], ['class' => 'btn btn-danger']) ?>
<!--    --><?//= Html::a(\Yii::$app->params['btnRegresar'],['/user/index'], ['class' => 'btn btn-default'])?>
<!--    --><?//= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success ' : 'btn btn-primary ']) ?>

</div>
<div class="panel panel-primary">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">

<div class="user-form">



    <?= $form->field($model, 'username')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 45]) ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>
<!--    --><?//= $form->field($model, 'status')->dropDownList(['10' => 'Activo', '0' => 'Inactivo'], ['prompt' => 'Seleccionar']) ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

    <?= $form->field($model, 'notification')->dropDownList($model->getStatusList()) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">

    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
