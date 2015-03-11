<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\Request;

/* @var $this yii\web\View */
/* @var $model app\models\Reply */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reply-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>
    <?=
    $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', 'username')
    ) ?>
<!--    --><?//= $form->field($model, 'request_id')->textInput() ?>
    <?=
    $form->field($model, 'request_id')->dropDownList(
        ArrayHelper::map(Request::find()->all(), 'id', 'id')
    ) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(['10' => 'Activo', '0' => 'Inactivo']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
