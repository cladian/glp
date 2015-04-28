<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/responsibilitytype/index'], ['class' => 'btn btn-default']) ?>
<!--    --><?//= Html::a(\Yii::$app->params['btnForo'], ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
</div>

<div class="panel panel-green">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">
<div class="responsibilitytype-form">



    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?/*= $form->field($model, 'status')->textInput() */?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

    <?/*= $form->field($model, 'created_at')->textInput() */?><!--

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

   <!-- <div class="form-group">
        <?/*= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnCrear'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) */?>
    </div>-->

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
