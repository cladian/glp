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
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */
/* @var $form yii\widgets\ActiveForm */

// http://demos.krajee.com/widget-details/depdrop
?>

<div class="inscription-form">

    <?php $form = ActiveForm::begin(); ?>



    <? /*= $form->field($model, 'complete')->textInput() */ ?>

    <? /*= $form->field($model, 'status')->textInput() */ ?>

    <!--    <? /*= $form->field($model, 'created_at')->textInput() */ ?>

    --><? /*= $form->field($model, 'updated_at')->textInput() */ ?>

    <!--    <? /*= $form->field($model, 'complete_logistic')->textInput() */ ?>

    <? /*= $form->field($model, 'complete_eventquiz')->textInput() */ ?>

    --><? /*= $form->field($model, 'complete_quiz')->textInput() */ ?>

    <!--    --><? //= $form->field($model, 'event_id')->textInput() ?>
    <?/*=
    $form->field($model, 'event_id')->dropDownList(
        ArrayHelper::map(Event::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) */
    ?>

    <!--    -->
    <!--    --><? //= $form->field($model, 'user_id')->input('hidden') ?>


    <div class="col-sm-6">

        <!--    --><? //= $form->field($model, 'registertype_type')->textInput() ?>

        <?=
        $form->field($model, 'registertype_type')->dropDownList(
            ArrayHelper::map(Registertype::find()->where(['id' => ['1', '2']])->all(), 'id', 'name')
        ) ?>

        <?= $form->field($model, 'registertype_assigment')->widget(DepDrop::classname(), [
                'data' => [$model->registertype_assigment => 'name'],
                'pluginOptions' => [
                    'initialize'=>true,
                    'depends' => [Html::getInputId($model, 'registertype_type')],
                    'placeholder' => 'Seleccione',
                    'url' => Url::to(['/inscription/subcat'])
                ]
            ]);


        ?>

    </div>
    <div class="col-sm-6">
        <!--    --><? //= $form->field($model, 'registertype_assigment')->textInput() ?>
        <!--    --><?/*=
    $form->field($model, 'registertype_assigment')->dropDownList(
        ArrayHelper::map(Registertype::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) */
        ?>


    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'exposition')->widget(SwitchInput::classname(), [
            'pluginOptions' => [
                'onText' => 'SI',
                'offText' => 'NO',
            ]
        ]); ?>
    </div>

    <div class="col-sm-6">
        <?= $form->field($model, 'service_terms')->widget(SwitchInput::classname(), [
            'pluginOptions' => [
                'onText' => 'SI',
                'offText' => 'NO',
            ]
        ]); ?>

    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><?= Html::encode($this->title) ?></div>
        <div class="panel-body">


            <!---->

            <?= $form->field($modelLogistic, 'leavingonorigincity')->textInput(['maxlength' => 45]) ?>
            <?=  $form->field($modelLogistic, 'residence')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                    'onText' => 'SI',
                    'offText' => 'NO',
                ]
            ]);?>


            <?= $form->field($modelLogistic, 'residenceobs')->textarea(['rows' => 6]) ?>

            <div class="panel panel-success">
                <div class="panel-heading"><h5>Información de llegada</h5></div>
                <div class="panel-body">
                    <div class="col-sm-3 col-xs-6">
                        <?= $form->field($modelLogistic, 'leavingonairline')->textInput(['maxlength' => 45]) ?>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <?= $form->field($modelLogistic, 'leavingonflightnumber')->textInput(['maxlength' => 10]) ?>
                    </div>

                    <div class="col-sm-3 col-xs-6">
                        <?= $form->field($modelLogistic, 'leavingondate')->widget(DatePicker::classname(), [
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

                        <?= $form->field($modelLogistic, 'leavingonhour')->widget(TimePicker::classname(), [
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
                        <?= $form->field($modelLogistic, 'returningonairline')->textInput(['maxlength' => 45]) ?>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <?= $form->field($modelLogistic, 'returningonflightnumber')->textInput(['maxlength' => 10]) ?>
                    </div>

                    <div class="col-sm-3 col-xs-6">
                        <?= $form->field($modelLogistic, 'returningondate')->widget(DatePicker::classname(), [
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


                        <?= $form->field($modelLogistic, 'returningonhour')->widget(TimePicker::classname(), [
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
                        <?= $form->field($modelLogistic, 'accommodationdatein')->widget(DatePicker::classname(), [
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
                        <?= $form->field($modelLogistic, 'accommodationdateout')->widget(DatePicker::classname(), [
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
        <!---->

    </div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
</div>
    <?php ActiveForm::end(); ?>

</div>
