<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Registertype;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */
/* @var $form yii\widgets\ActiveForm */
// http://demos.krajee.com/widget-details/depdrop
?>

<?php $form = ActiveForm::begin(); ?>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancel'], ['/inscription/viewown', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>


    <?= Html::submitButton($model->isNewRecord ? 'Crear y continuar' : 'Guardar y continuar ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
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
    <div class="panel-heading"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Información de
        inscripción
    </div>
    <div class="panel-body">


        <div class="col-sm-6">
            <?= $form->field($model, 'registertype_type')->dropDownList(
                ArrayHelper::map(Registertype::find()->where(['id' => ['1', '2']])->all(), 'id', 'name')
            ) ?>
            <?= $form->field($model, 'registertype_assigment')->widget(DepDrop::classname(), [
                'data' => [$model->registertype_assigment => 'name'],
                'pluginOptions' => [
                    'initialize' => true,
                    'depends' => [Html::getInputId($model, 'registertype_type')],
                    'placeholder' => 'Seleccione',
                    'url' => Url::to(['/inscription/subcat'])
                ]
            ]);
            ?>
        </div>
        <div class="col-sm-6">
            <?=
            $form->field($model, 'exposition')->dropDownList(['0' => 'NO', '1' => 'SI']);
            ?>
        </div>
        <div class="col-sm-6">
            <?=
            $form->field($model, 'service_terms')->dropDownList(['0' => 'NO', '1' => 'SI']);
            ?>

        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Información Logística
    </div>
    <div class="panel-body">
        <?= $form->field($modelLogistic, 'leavingonorigincity')->textInput(['maxlength' => 45]); ?>
        <div class="alert alert-info" role="alert">
            <span class="glyphicon glyphicon-info-sign pull-right" aria-hidden="true"></span>

            <p>Si usted reside en la ciudad/país del evento y se va a transportar de forma terrestre hasta la ciudad del
                evento, proporcione información adicional
                para facilitar la coordinación logistica dentro de la ciudad/país de su residencia</p>

            <?=
            $form->field($modelLogistic, 'residence')->dropDownList(['0' => 'NO', '1' => 'SI']);
            ?>

            <?= $form->field($modelLogistic, 'residenceobs')->textarea(['rows' => 6]) ?>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Información de llegada <span
                    class="pull-right"><small> (*) No requerida si reside en la ciudad del evento</small></span>
            </div>
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
            <div class="panel-heading"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Información de
                Salida <span class="pull-right"><small> (*) No requerida si reside en la ciudad del evento
                    </small></span></div>
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
            <div class="panel-heading"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Información de
                Alojamiento
            </div>
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

<?php ActiveForm::end(); ?>
