<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="col-sm-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => 100]) ?>
        <?= $form->field($model, 'responsability_name')->textInput(['maxlength' => 250]) ?>

        <?=
        $form->field($model, 'responsibilitytype_id')->dropDownList(
            ArrayHelper::map(Responsibilitytype::find()->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
        <?= $form->field($model, 'institution_name')->textInput(['maxlength' => 250]) ?>
        <?=
        $form->field($model, 'institutiontype_id')->dropDownList(
            ArrayHelper::map(Institutiontype::find()->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => 15]) ?>
        <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => 15]) ?>
        <?= $form->field($model, 'gender')->dropDownList(['M' => 'M', 'F' => 'F',], ['prompt' => '']) ?>

        <?=
        $form->field($model, 'country_id')->dropDownList(
            ArrayHelper::map(Country::find()->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
    </div>
    <div class="col-sm-3">
        <?= Html::img($model->getImageUrl(),['class'=>'img-responsive img-thumbnail']);?>
    <?=
    $form->field($model, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Seleccionar Fotografía',
            'initialPreview'=>[
                'initialPreview' => [
                    Html::img($model->getImageUrl(), ['class' => 'file-preview-image', 'alt' => 'Default', 'title' => 'default']),
                ],
            ],
        ],
    ]);
    // $form->field($model, 'photo')->textarea(['rows' => 6]) ?>
</div>



    <?php ActiveForm::end(); ?>

</div>
