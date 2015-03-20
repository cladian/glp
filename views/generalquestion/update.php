<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Generalquestion */

$this->title = 'Actualizar Pregunta General: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Preguntas Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>
