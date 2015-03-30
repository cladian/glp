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
            <?= Html::img($model->getImageUrl(),['class'=>'img-responsive img-thumbnail']);?>
        </div>
    </center>

    <center>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-floppy-disk"></span> Crear' : '<span class="glyphicon glyphicon-floppy-disk"></span> Guardar', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-block' : 'btn btn-primary btn-lg btn-block']) ?>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                
                <?= Html::a(\Yii::$app->params['btnCancelar'] , ['/site/index'], ['class' => 'btn btn-danger btn-lg btn-block']) ?>
            </div>
        </div>
    </center>
    <?php ActiveForm::end(); ?>

</div>
