<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Imagen */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancelar'], ['/topic/view', 'id' => $id], ['class' => 'btn btn-danger']) ?>

    <!----><?//= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

</div>
<div class="panel panel-green">
    <div class="panel-heading">Crear Imagen</div>
    <div class="panel-body">

<div class="imagen-form">

    <?= $form->field($model, 'name')->textInput(['maxlength' => 250]) ?>

<!--     --><?//= $form->field($model, 'file')->textarea(['rows' => 6]) ?><!-- -->

    <?=
    $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => false,
            'showUpload' => false,
            'showPreview' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Explorar',


                'initialPreview' => [
                    //     Html::img($model->getImageUrl(), ['class' => 'file-preview-image', 'alt' => 'Default', 'title' => 'default']),

                ],
            ],
        ]); ?>

        <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>
        <!--     <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->




    </div>
    </div>
    </div>
<?php ActiveForm::end(); ?>