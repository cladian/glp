<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Question;

/* @var $this yii\web\View */
/* @var $model app\models\Generalquestion */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancelar'], ['/generalquestion'], ['class' => 'btn btn-danger']) ?>
<!--    --><?//= Html::a(\Yii::$app->params['btnPreguntaGeneral'], ['create'], ['class' => 'btn btn-success']) ?>
<!--    --><?//= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnCrear'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
</div>

<div class="panel panel-green">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
<div class="generalquestion-form">




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

    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
