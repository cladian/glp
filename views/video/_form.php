<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="breadcrumb">

    <?= Html::a(\Yii::$app->params['btnCancelar'], ['/phforum/view', 'id' => $id], ['class' => 'btn btn-danger']) ?>

    <!--            --><?//= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

</div>
<div class="panel panel-green">
    <div class="panel-heading">Crear Video</div>
    <div class="panel-body">

<div class="video-form">



    <?= $form->field($model, 'name')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'ulr')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

 <!--   <div class="form-group">
        <?/*= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) */?>
    </div>-->



</div>

<?php ActiveForm::end(); ?>

</div>
</div>