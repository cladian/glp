<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\Logistic */
/* @var $form yii\widgets\ActiveForm */

// http://demos.krajee.com/widget-details/datepicker
// http://getbootstrap.com/components/#panels
?>

<div class="logistic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inscription_id')->textInput() ?>

    <?= $form->field($model, 'leavingonorigincity')->textInput(['maxlength' => 45]) ?>
    <?=  $form->field($model, 'residence')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'onText' => 'SI',
            'offText' => 'NO',
        ]
    ]);?>


    <?= $form->field($model, 'residenceobs')->textarea(['rows' => 6]) ?>

    <div class="panel panel-success">
        <div class="panel-heading"><h5>Información de llegada</h5></div>
        <div class="panel-body">
            <div class="col-sm-3 col-xs-6">
                <?= $form->field($model, 'leavingonairline')->textInput(['maxlength' => 45]) ?>
            </div>
            <div class="col-sm-3 col-xs-6">
                <?= $form->field($model, 'leavingonflightnumber')->textInput(['maxlength' => 10]) ?>
            </div>

            <div class="col-sm-3 col-xs-6">
                <?= $form->field($model, 'leavingondate')->widget(DatePicker::classname(), [
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
            <div class="col-sm-3 col-xs-6">

                <?= $form->field($model, 'leavingonhour')->widget(TimePicker::classname(), [
                    'pluginOptions' => [
                        'showSeconds' => false,
                        'showMeridian' => false,
                    ]
                ]); ?>
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading"><h5>Información de Salida</h5></div>
        <div class="panel-body">
            <div class="col-sm-3 col-xs-6">
                <?= $form->field($model, 'returningonairline')->textInput(['maxlength' => 45]) ?>
            </div>
            <div class="col-sm-3 col-xs-6">
                <?= $form->field($model, 'returningonflightnumber')->textInput(['maxlength' => 10]) ?>
            </div>

            <div class="col-sm-3 col-xs-6">
                <?= $form->field($model, 'returningondate')->widget(DatePicker::classname(), [
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
            <div class="col-sm-3 col-xs-6">


                <?= $form->field($model, 'returningonhour')->widget(TimePicker::classname(), [
                    'pluginOptions' => [
                        'showSeconds' => false,
                        'showMeridian' => false,
                    ]
                ]); ?>
            </div>
        </div>
    </div>


    <div class="panel panel-warning">
        <div class="panel-heading"><h5>Información de Alojamiento</h5></div>
        <div class="panel-body">

    <div class="col-sm-3 col-xs-6">
        <?= $form->field($model, 'accommodationdatein')->widget(DatePicker::classname(), [
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
    <div class="col-sm-3 col-xs-6">
        <?= $form->field($model, 'accommodationdateout')->widget(DatePicker::classname(), [
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

        </div>
    </div>
</div>


<!--    <?/*= $form->field($model, 'status')->textInput() */?>

    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
