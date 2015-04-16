<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use app\models\Event;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Phforum */
/* @var $form yii\widgets\ActiveForm */
$this->title = $model->name;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="class breadcrumb">
    <?php if($model->isNewRecord ){?>
        <?= Html::a(\Yii::$app->params['btnCancelar'], ['/phforum/index'], ['class' => 'btn btn-danger']) ?>
    <?php }else {?>
        <?= Html::a(\Yii::$app->params['btnCancelar'], ['/phforum/view', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    <?php }?>

    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

</div>

<div class="panel panel-green">
    <div class="panel-heading"><?= $this->title = 'Actualización de Foro: ' . ' ' . $model->name; ?> </div>
    <div class="panel-body">
        <div class="phforum-form">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 250]) ?>
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
            <?= $form->field($model, 'meeting_at')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Fecha'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'readonly' => true,
                    'disabled' => true,
                ]
            ]);
            ?>
            <?= $form->field($model, 'memory_at')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Fecha'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'readonly' => true,
                    'disabled' => true,
                ]
            ]);
            ?>

            <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'complete'
            ]) ?>

            <?=
            $form->field($model, 'event_id')->dropDownList(
                ArrayHelper::map(Event::find()->all(), 'id', 'name'),
                ['prompt' => 'Seleccione']
            ) ?>

            <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

            <?= $form->field($model, 'is_private')->dropDownList(['0' => 'NO', '1' => 'SI'], ['prompt' => 'Seleccionar']) ?>

            <?= $form->field($model, 'status')->dropDownList(['1' => 'Activo', '0' => 'Inactivo'], ['prompt' => 'Seleccionar']) ?>


        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
