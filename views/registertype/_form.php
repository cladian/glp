<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Registertype;

/* @var $this yii\web\View */
/* @var $model app\models\Registertype */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="regresar">
    <?= Html::a(\Yii::$app->params['btnRegresar'],['/registertype/index'], ['class' => 'btn btn-default'])?>

    <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnGuardar'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
</div>
<div class="panel panel-green">
    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">

<div class="registertype-form">



    <?= $form->field($model, 'name')->textInput(['maxlength' => 45]) ?>

<!--    --><?//= $form->field($model, 'role')->dropDownList([ 'P' => 'P', 'A' => 'A', ], ['prompt' => '']) ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

    <?/*= $form->field($model, 'created_at')->textInput() */?><!--

    <?/*= $form->field($model, 'updated_at')->textInput() */?>

    --><?/*= $form->field($model, 'registertype_id')->textInput() */?>
    <?=
    $form->field($model, 'registertype_id')->dropDownList(
        ArrayHelper::map(Registertype::find()->all(), 'id', 'name'),
        ['prompt' => 'Seleccione']
    ) ?>

    <!--<div class="form-group">
        <?/*= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnCrear'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) */?>
    </div>-->

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
