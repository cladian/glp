<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Registertype;

/* @var $this yii\web\View */
/* @var $model app\models\Registertype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registertype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'role')->dropDownList([ 'P' => 'P', 'A' => 'A', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?/*= $form->field($model, 'created_at')->textInput() */?><!--

    <?/*= $form->field($model, 'updated_at')->textInput() */?>

    --><?/*= $form->field($model, 'registertype_id')->textInput() */?>
    <?=
    $form->field($model, 'registertype_id')->dropDownList(
        ArrayHelper::map(Registertype::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
