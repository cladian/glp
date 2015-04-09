<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\models\Inscription;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancel'], [ '/inscription/viewown', 'id'=>$model->inscription_id], ['class' => 'btn btn-danger']) ?>
    <?=Html::submitButton(\Yii::$app->params['btnGuardarSiguiente'], ['class' => 'btn btn-success']);?>
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
  <div class="panel-heading">Crear Solicitudes</div>
  <div class="panel-body">
    


    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>
  </div>
    <div class="panel-footer">
        <?= Html::submitButton($model->isNewRecord ? \Yii::$app->params['btnCrear'] : \Yii::$app->params['btnGuardar'], ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        </div>
</div>
<div class="request-form">


    <div class="form-group">

    </div>


</div>
<?php ActiveForm::end(); ?>
