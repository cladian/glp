<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\ColorInput;
use yii\bootstrap\Modal;
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
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancel'], [ '/profile/updateown', 'id'=>$model->id], ['class' => 'btn btn-danger']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Crear' : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn btn-success' : 'btn btn btn-success']) ?>


    <!-- AYUDA-->
    <?php
    Modal::begin([
        'header' => '<h4>Inscripción</h4>',
        'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
    ]);

    echo $this->render('/help/inscription-index');
    Modal::end();
    ?>
</div>

<div class="panel panel-primary">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
        <div class="profile-update">


<div class="profile-form">


    <center>
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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?= Html::img($model->getImageUrl(),['class'=>'img-responsive img-thumbnail']);?>
    </div>
    </center>






</div>
</div>
</div>
<?php ActiveForm::end(); ?>