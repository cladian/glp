<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Event;
use app\models\Question;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Eventquestion */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancel'], [ '/event/view', 'id'=>$model->event_id], ['class' => 'btn btn-danger']) ?>
<!--    --><?//= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <!-- AYUDA-->
    <?php
/*    Modal::begin([
        'header' => '<h4>Inscripción</h4>',
        'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
    ]);

    echo $this->render('/help/inscription-index');
    Modal::end();
    */?>
</div>

<div class="panel panel-green">
    <div class="panel-heading">Preguntas por Evento</div>
    <div class="panel-body">

<div class="eventquestion-form">

    <?/*= $form->field($model, 'status')->textInput() */?>
<!--    --><?//= $form->field($model, 'status')->dropDownList([ '10' => 'Activo','0' => 'Inactivo'], [ 'prompt' => 'Seleccionar']) ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

<!--        --><?//= $form->field($model, 'event_id')->textInput() ?>
<!--    --><?//=
//    $form->field($model, 'event_id')->dropDownList(
//        ArrayHelper::map(Event::find()->all(), 'id', 'name')
//    ) ?>

<!--    --><?//= $form->field($model, 'question_id')->textInput() ?>

<!--    --><?/*=
    $form->field($model, 'question_id')->dropDownList(
        ArrayHelper::map(Question::find()->where(['type'=>'EVENTO'])->all(), 'id', 'text'),
        ['prompt' => 'Seleccione']

    ) */?>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
