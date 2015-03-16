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

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



<!--    --><?//= $form->field($model, 'file')->textarea(['rows' => 1]) ?>
    <?=
    // Usage with ActiveForm and model
    $form->field($model, 'file')->widget(FileInput::classname(), [
//        'options' => ['accept' => 'image/*'],
    ]);

    ?>

    <?/*= $form->field($model, 'photo')->textarea(['rows' => 1]) */?>

    <?=
    $form->field($model, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Seleccione la fotografía',
            'initialPreview'=>[
                //     Html::img($model->getImageUrl(), ['class' => 'file-preview-image', 'alt' => 'Default', 'title' => 'default']),

            ],
        ],
    ]);
    // $form->field($model, 'photo')->textarea(['rows' => 6])  ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
