<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\ColorInput;
use kartik\widgets\SwitchInput;

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
    <div class="col-sm-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => 100]) ?>
    </div>


    <div class="col-sm-6">
        <?= $form->field($model, 'responsability_name')->textInput(['maxlength' => 250]) ?>
    </div>

    <div class="col-sm-6">
        <?=
        $form->field($model, 'responsibilitytype_id')->dropDownList(
            ArrayHelper::map(Responsibilitytype::find()->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'institution_name')->textInput(['maxlength' => 250]) ?>
    </div>
    <div class="col-sm-6">
        <?=
        $form->field($model, 'institutiontype_id')->dropDownList(
            ArrayHelper::map(Institutiontype::find()->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => 15]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => 15]) ?>
    </div>
    <div class="col-sm-6">
        <?/*= $form->field($model, 'gender')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::RADIO,
            'items' => [
                ['label' => 'Masculino', 'value' => 'M'],
                ['label' => 'Femenino', 'value' => 'F'],

            ],
        ]); */?>
        <?= $form->field($model, 'gender')->dropDownList(['M' => 'M', 'F' => 'F',], ['prompt' => '']) ?>
    </div>
    <div class="col-sm-6">
        <?=
        $form->field($model, 'country_id')->dropDownList(
            ArrayHelper::map(Country::find()->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
