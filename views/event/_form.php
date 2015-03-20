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
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-sm-12">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'general_content')->textarea(['rows' => 6]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'methodology')->textarea(['rows' => 6]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'addressed_to')->textarea(['rows' => 6]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'included')->textarea(['rows' => 6]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'requirements')->textarea(['rows' => 6]) ?>
    </div>
    <div class="col-sm-12">
        <?= $form->field($model, 'url')->textarea(['rows' => 1]) ?>
    </div>
</div>





<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?=$form->field($model, 'eventtype_id')->dropDownList(
            ArrayHelper::map(Eventtype::find()->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
    </div>
<!--Ciudad--> 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <?= $form->field($model, 'city')->textInput(['maxlength' => 100]) ?>
    </div>

<!--END Ciudad-->
<!--Pais--> 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <?=
        $form->field($model, 'country_id')->dropDownList(
            ArrayHelper::map(Country::find()->all(), 'id', 'name'),
            ['prompt' => 'Seleccione']
        ) ?>
    </div> 
<!--END Pais--> 
<!--Fecha-->    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <?= $form->field($model, 'begin_at')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Fecha'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',

                'readonly' => true,
                'disabled' => true,
            ]
        ]);
        ?>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <?= $form->field($model, 'end_at')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Fecha'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',

                'readonly' => true,
                'disabled' => true,
            ]
        ]);
        ?>

    </div>
    
<!--END Fecha-->
<!--Costo--> 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <?= $form->field($model, 'cost')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => '$ ',
                'suffix' => '',
                'allowNegative' => false,
                'precision' => 2,
            ]
        ]); ?>
    </div>
<!--END Costo--> 
<!--Descuento--> 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <?= $form->field($model, 'discount')->widget(SwitchInput::classname(), [
            'pluginOptions' => [
                'onText' => 'SI',
                'offText' => 'NO',
            ]
        ]); ?>
    </div>
<!--END Descuento--> 
<!--Descripcion Descuento--> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?= $form->field($model, 'discount_description')->textInput(['maxlength' => 250]) ?>
    </div>
<!--END Descripcion Descuento--> 
<!--Fecha Descuento--> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?= $form->field($model, 'discount_end_at')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Fecha'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',

                    'readonly' => true,
                    'disabled' => true,
                ]
            ]);
            ?>

    </div>
<!--END Fecha Descuento--> 
<!--Año
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <?= $form->field($model, 'year')->textInput() ?>
    </div>
END Año--> 
    <!--    --><? //= $form->field($model, 'status')->textInput() ?>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php if (!$model->isNewRecord )  echo $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>
    </div>

    <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>
    <!---->
    <!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>

    <!--    --><? //= $form->field($model, 'country_id')->textInput() ?>
    

    <!--    --><? //= $form->field($model, 'eventtype_id')->textInput() ?>
    
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnActualizar'], ['class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-block' : 'btn btn-primary btn-lg btn-block']) ?>
    </div>

</div>
</div>

    <?php ActiveForm::end(); ?>