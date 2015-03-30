<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Question;

/* @var $this yii\web\View */
/* @var $model app\models\Generalquestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generalquestion-form">

    <?php $form = ActiveForm::begin(); ?>


     <?/*= $form->field($model, 'status')->textInput() */?>

    <!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
    <!---->
    <!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

<!--    --><?/*=
    $form->field($model, 'question_id')->dropDownList(
        ArrayHelper::map(Question::find()->all(), 'id', 'text'),
        ['prompt' => 'Seleccione']
    ) */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnCrear'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
