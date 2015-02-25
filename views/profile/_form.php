<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\ColorInput;

/* modelos para incluir */
use app\models\Institutiontype;
use app\models\Responsibilitytype;
use app\models\Country;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'institution_name')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'responsability_name')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'gender')->dropDownList(['M' => 'M', 'F' => 'F',], ['prompt' => '']) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'complete')->textInput() ?>
    <?/*= $form->field($model, 'complete')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select color ...'],]);  */?>


    <?= $form->field($model, 'status')->textInput() ?>

    <?/*= $form->field($model, 'created_at')->textInput() */?>

    <?/*= $form->field($model, 'updated_at')->textInput() */?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <? /*= $form->field($model, 'institutiontype_id')->textinput() */ ?>

    <?=
    $form->field($model, 'institutiontype_id')->dropDownList(
        ArrayHelper::map(Institutiontype::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) ?>


    <? /*= $form->field($model, 'responsibilitytype_id')->textInput() */ ?>

    <?=
    $form->field($model, 'responsibilitytype_id')->dropDownList(
        ArrayHelper::map(Responsibilitytype::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) ?>

  <?/*= $form->field($model, 'country_id')->textInput() */?>
    <?=
    $form->field($model, 'country_id')->dropDownList(
        ArrayHelper::map(Country::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
