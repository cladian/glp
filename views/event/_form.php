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
    <?= $form->field($model, 'file')->textarea(['rows' => 1]) ?>

    <?/*= $form->field($model, 'photo')->textarea(['rows' => 1]) */?>
    <?=
    $form->field($model, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'img/event/*'],
    ]);
    ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 1]) ?>
    <div class="col-sm-3 col-xs-6">
    <?= $form->field($model, 'city')->textInput(['maxlength' => 100]) ?>
        </div>
    <div class="col-sm-3 col-xs-6">
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
    <div class="col-sm-3 col-xs-6">
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


    <div class="col-sm-3 col-xs-6">

    <?= $form->field($model, 'cost')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => '$ ',
            'suffix' => '',
            'allowNegative' => false,
            'precision' => 2,
        ]
    ]);?>
        </div>
    <hr>



            <div class="col-sm-3 col-xs-6">
            <?=  $form->field($model, 'discount')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                    'onText' => 'SI',
                    'offText' => 'NO',
                ]
            ]);?>
        </div>

            <div class="col-sm-9 col-xs-6">
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
            <div class="xs-12">
            <?= $form->field($model, 'discount_description')->textInput(['maxlength' => 250]) ?>
                </div>





<?= $form->field($model, 'year')->textInput() ?>

<!--    --><? //= $form->field($model, 'status')->textInput() ?>

<?= $form->field($model, 'status')->dropDownList(['10' => 'Activo', '0' => 'Inactivo'], ['prompt' => 'Seleccionar']) ?>

<!--    --><? //= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>

<!--    --><? //= $form->field($model, 'country_id')->textInput() ?>
<?=
$form->field($model, 'country_id')->dropDownList(
    ArrayHelper::map(Country::find()->all(), 'id', 'name'),
    ['prompt' => 'Seleccione']
) ?>

<!--    --><? //= $form->field($model, 'eventtype_id')->textInput() ?>
<?=
$form->field($model, 'eventtype_id')->dropDownList(
    ArrayHelper::map(Eventtype::find()->all(), 'id', 'name'),
    ['prompt' => 'Seleccione']
) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
