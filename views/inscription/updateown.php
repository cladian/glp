<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = 'Actualización de  Inscripción: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>
  </div>
</div>