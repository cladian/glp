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
    <center>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?= Html::img($model->getImageUrl(),['class'=>'img-responsive img-thumbnail']);?>
    </div>
    </center>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
    <div class="form-group">
    <?=
    $form->field($model, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => false,
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
    </div>
</div>
<center>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Crear' : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-block' : 'btn btn-primary btn-lg btn-block']) ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                
                <?= Html::a('Cancelar', ['/profile/viewown'], ['class' => 'btn btn-danger btn-lg btn-block']) ?>
            </div>
        </div>
    </center>
    <div class="form-group">
        
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
