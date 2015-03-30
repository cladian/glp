<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Registertype;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\SwitchInput;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;



/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = 'Crear Inscripción';
?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])?>
</div>
<div class="inscription-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
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

<!--          --><?/*= $form->field($model, 'exposition')->widget(SwitchInput::classname(), [
              'pluginOptions' => [
                  'onText' => 'SI',
                  'offText' => 'NO',
              ]
          ]); */?>

          <?=
          $form->field($model, 'exposition')->dropDownList(['0' => 'NO', '1' => 'SI']);
          ?>

      </div>

      <div class="col-sm-6">

          <?/*= $form->field($model, 'service_terms')->widget(SwitchInput::classname(), [
              'pluginOptions' => [
                  'onText' => 'SI',
                  'offText' => 'NO',
              ]
          ]); */?>

          <?=
          $form->field($model, 'service_terms')->dropDownList(['0' => 'NO', '1' => 'SI']);
          ?>

      </div>


  </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">


<!---->

        <?= $form->field($modelLogistic, 'leavingonorigincity')->textInput(['maxlength' => 45]) ?>


<!--        --><?/*=  $form->field($modelLogistic, 'residence')->widget(SwitchInput::classname(), [
            'pluginOptions' => [
                'onText' => 'SI',
                'offText' => 'NO',
            ]
        ]);*/?>

        <?=
        $form->field($modelLogistic, 'residence')->dropDownList(['0' => 'NO', '1' => 'SI']);
        ?>

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
</div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnCrear'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
