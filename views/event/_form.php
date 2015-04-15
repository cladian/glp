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
use yii\bootstrap\Modal;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

    <div class="breadcrumb">
        <?= Html::a(\Yii::$app->params['btnCancel'], [ '/event/index', 'id'=>$model->id], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnActualizar'], ['class' => $model->isNewRecord ? 'btn btn-success ' : 'btn btn-primary ']) ?>

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
<div class="event-form">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">




    <div class="col-sm-12">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>
    </div>
    <div class="col-sm-12">
        <?= $form->field($model, 'short_description')->textarea(['rows' => 3]) ?>
    </div>
    <div class="col-sm-12">
<!--        --><?//= $form->field($model, 'general_content')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'general_content')->widget(CKEditor::className(), [
            'options' => ['rows' => 3],
            'preset' => 'complete'
        ]) ?>
    </div>
    <div class="col-sm-12">
<!--        --><?//= $form->field($model, 'methodology')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'methodology')->widget(CKEditor::className(), [
            'options' => ['rows' => 3],
            'preset' => 'complete'
        ]) ?>
    </div>
    <div class="col-sm-12">
<!--        --><?//= $form->field($model, 'addressed_to')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'addressed_to')->widget(CKEditor::className(), [
            'options' => ['rows' => 3],
            'preset' => 'complete'
        ]) ?>
    </div>
    <div class="col-sm-12">
<!--        --><?//= $form->field($model, 'included')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'included')->widget(CKEditor::className(), [
            'options' => ['rows' => 3],
            'preset' => 'complete'
        ]) ?>
    </div>
    <div class="col-sm-12">
<!--        --><?//= $form->field($model, 'requirements')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'requirements')->widget(CKEditor::className(), [
            'options' => ['rows' => 3],
            'preset' => 'complete'
        ]) ?>
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


       <!-- --><?/*= $form->field($model, 'discount')->widget(SwitchInput::classname(), [
            'pluginOptions' => [
                'onText' => 'SI',
                'offText' => 'NO',
            ]
        ]); */?>

        <?=
        $form->field($model, 'discount')->dropDownList(['0' => 'NO', '1' => 'SI']);
        ?>
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
    <div class="col-sm-12">
        <?= $form->field($model, 'url')->textarea(['rows' => 1]) ?>
    </div>

    <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>
    <!---->
    <!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>

    <!--    --><? //= $form->field($model, 'country_id')->textInput() ?>
    

    <!--    --><? //= $form->field($model, 'eventtype_id')->textInput() ?>
    
</div>
</div>
</div>
</div>
    <?php ActiveForm::end(); ?>