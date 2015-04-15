<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="breadcrumb">

        <?= Html::a(\Yii::$app->params['btnCancelar'], ['/phforum/view', 'id' => $id], ['class' => 'btn btn-danger']) ?>

<!--            --><?//= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>


    </div>
    <div class="panel panel-green">
        <div class="panel-heading">Crear Documento</div>
        <div class="panel-body">
            <div class="document-form">
                <?= $form->field($model, 'name')->textInput(['maxlength' => 250]) ?>


                <!--    --><? //= $form->field($model, 'file')->textarea(['rows' => 6]) ?>

                <?=
                // Usage with ActiveForm and model
                $form->field($model, 'file')->widget(FileInput::classname(), [
                    'pluginOptions' => [

                        'showRemove' => false,
                        'showUpload' => false,
                        'showPreview' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseLabel' => 'Explorar'

                    ],
                ]);
                ?>
                <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>