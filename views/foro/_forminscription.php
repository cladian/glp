<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Userphforum;

/* @var $this yii\web\View */
/* @var $model app\models\Userphforum */
/* @var $form yii\widgets\ActiveForm */


?>
<?php $form = ActiveForm::begin(); ?>
<div class="class breadcrumb">

    <?= Html::a(\Yii::$app->params['btnCancelar'], ['foro/index'], ['class' => 'btn btn-danger']) ?>

<!--    --><?//= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>


</div>

<div class="panel panel-primary">
    <div class="panel-heading"><?='Nombre del Foro:  ' ,  $modelForo->name; ?></div>

    <div class="panel-body">

<div class="userphforum-form">

<!--    --><?//= $form->field($model, 'phforum_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?>

<!--    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

   <!-- --><?/*= $form->field($model, 'status')->textInput() */?>

<!--    --><?//= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

    <div class="form-group">

    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>

