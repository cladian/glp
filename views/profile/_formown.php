<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\bootstrap\Modal;
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
<?php $form = ActiveForm::begin(); ?>
    <div class="breadcrumb">
        <?= Html::a(\Yii::$app->params['btnCancel'], [ '/site/admuser', 'id'=>$model->id], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-floppy-disk"></span> Crear' : '<span class="glyphicon glyphicon-floppy-disk"></span> Guardar', ['class' => $model->isNewRecord ? 'btn btn btn-success' : 'btn btn btn-success']) ?>


<?php  if (!$model->isNewRecord):
?>
      <?= Html::a('<span class="glyphicon glyphicon-camera"></span> Actualizar Imagen', ['avatarown', 'id' => $model->id], ['class' => 'btn btn-info btn btn btn-success']) ?>
<?php endif; ?>


    </div>
<div class="panel panel-primary">

    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
        <div class="profile-update">


<div class="profile-form">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => 100]) ?>
        <?= $form->field($model, 'gender')->dropDownList(['M' => 'M', 'F' => 'F',], ['prompt' => '']) ?>
        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => 15]) ?>
        <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => 15]) ?>
        

        
        
    </div>
    

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?=$form->field($model, 'country_id')->dropDownList(
            ArrayHelper::map(Country::find()->where(['status'=> Country::STATUS_ACTIVE])->orderby('name')->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
        <?= $form->field($model, 'institution_name')->textInput(['maxlength' => 250]) ?>
        <?=$form->field($model, 'institutiontype_id')->dropDownList(
            ArrayHelper::map(Institutiontype::find()->orderby('name')->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
        
        <?= $form->field($model, 'responsability_name')->textInput(['maxlength' => 250]) ?>
        <?=$form->field($model, 'responsibilitytype_id')->dropDownList(
            ArrayHelper::map(Responsibilitytype::find()->orderby('name')->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
        
        
    </div>
    
    <center>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <?= Html::img(\Yii::$app->params['webRoot'].'/'.$model->getImageUrl(),['class'=>'img-responsive img-thumbnail']);?>
        </div>
    </center>

    <center>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

        </div>
    </center>
    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
