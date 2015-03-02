<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;

use app\models\Registertype;
use app\models\User;
use app\models\Event;
use kartik\widgets\DepDrop;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Inscription */
/* @var $form yii\widgets\ActiveForm */

// http://demos.krajee.com/widget-details/depdrop
?>

<div class="inscription-form">

    <?php $form = ActiveForm::begin(); ?>



    <?/*= $form->field($model, 'complete')->textInput() */?>

    <?/*= $form->field($model, 'status')->textInput() */?>

<!--    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

<!--    <?/*= $form->field($model, 'complete_logistic')->textInput() */?>

    <?/*= $form->field($model, 'complete_eventquiz')->textInput() */?>

    --><?/*= $form->field($model, 'complete_quiz')->textInput() */?>

<!--    --><?//= $form->field($model, 'event_id')->textInput() ?>
    <?/*=
    $form->field($model, 'event_id')->dropDownList(
        ArrayHelper::map(Event::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) */?>

<!--    -->
<!--    --><?//= $form->field($model, 'user_id')->input('hidden') ?>


    <div class="col-sm-6">

<!--    --><?//= $form->field($model, 'registertype_type')->textInput() ?>

    <?=
    $form->field($model, 'registertype_type')->dropDownList(
        ArrayHelper::map(Registertype::find()->where(['id'=>['1','2']])->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) ?>
        <?=
         $form->field($model, 'registertype_assigment')->widget(DepDrop::classname(), [
            // 'type'=>DepDrop::TYPE_DEFAULT,
             'options'=>['id'=>'name'],
             'pluginOptions'=>[
                /*'depends'=>['registertype_type'],*/
                'depends'=>[Html::getInputId($model, 'registertype_type')],
                'placeholder'=>'Seleccione',
                'url'=>Url::to(['/inscription/subcat'])
            ]
        ]);
        ?>

</div>
    <div class="col-sm-6">
<!--    --><?//= $form->field($model, 'registertype_assigment')->textInput() ?>
<!--    --><?/*=
    $form->field($model, 'registertype_assigment')->dropDownList(
        ArrayHelper::map(Registertype::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) */?>


</div>
    <div class="col-sm-6">
        <?=  $form->field($model, 'exposition')->widget(SwitchInput::classname(), [
            'pluginOptions' => [
                'onText' => 'SI',
                'offText' => 'NO',
            ]
        ]);?>
    </div>

    <div class="col-sm-6">
        <?=  $form->field($model, 'service_terms')->widget(SwitchInput::classname(), [
            'pluginOptions' => [
                'onText' => 'SI',
                'offText' => 'NO',
            ]
        ]);?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
