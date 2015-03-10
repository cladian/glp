<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\ColorInput;

/* modelos para incluir */
use app\models\Institutiontype;
use app\models\Responsibilitytype;
use app\models\Country;
use kartik\widgets\FileInput;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
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
            'browseLabel' =>  'Seleccione la fotografía',
            'initialPreview'=>[
               //     Html::img($model->getImageUrl(), ['class' => 'file-preview-image', 'alt' => 'Default', 'title' => 'default']),

            ],
        ],
    ]);
    // $form->field($model, 'photo')->textarea(['rows' => 6])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['/profile/viewown'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
