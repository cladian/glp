<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = 'Crear Inscripción';
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-primary">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>
  </div>
</div>