    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\Eventtype;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\money\MaskMoney;
use kartik\widgets\FileInput;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="breadcrumb">
        <?= Html::a(\Yii::$app->params['btnCancel'], [ '/event/view', 'id'=>$model->id], ['class' => 'btn btn-danger']) ?>
<!--        --><?//= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <!-- AYUDA-->
        <?php
/*        Modal::begin([
            'header' => '<h4>Inscripción</h4>',
            'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
        ]);
        echo $this->render('/help/inscription-index');
        Modal::end();
        */?>

    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Imagen</div>
        <div class="panel-body">
<div class="event-form">

    <?/*= $form->field($model, 'photo')->textarea(['rows' => 1]) */?>
    <?=
    $form->field($model, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => true,
            'showUpload' => false,
            'showPreview' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Explorar',

            'initialPreview'=>[
                //     Html::img($model->getImageUrl(), ['class' => 'file-preview-image', 'alt' => 'Default', 'title' => 'default']),

            ],
        ],
    ]);
    // $form->field($model, 'photo')->textarea(['rows' => 6])  ?>


<?php ActiveForm::end(); ?>

</div>
</div>
</div>
