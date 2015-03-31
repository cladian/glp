<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => 250]) ?>

<!--    --><?//= $form->field($model, 'file')->textarea(['rows' => 6]) ?>





    <?=
    // Usage with ActiveForm and model
    $form->field($model, 'file')->widget(FileInput::classname(), [
        'pluginOptions' => [

            'showRemove' => false,
            'showUpload' => false,
            'showPreview' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseLabel' =>  'Explorar'

        ],
    ]);

    ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
