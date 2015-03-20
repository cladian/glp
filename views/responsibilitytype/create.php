<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;



/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */

$this->title = 'Crear Tipo de Responsabilidad';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Responsabilidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<<<<<<< HEAD
<div class="responsibilitytype-create">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    --><?/*= $this->render('_form', [
        'model' => $model,
    ]) */?>

    <?php
    $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_INLINE]);
    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'attributes'=>$model->formAttribs
    ]);
    ActiveForm::end();
    ?>
</div>
=======
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>
>>>>>>> daniel
