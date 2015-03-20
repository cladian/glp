<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Eventanswer */

$this->title = 'Crear Respuesta por Evento';
$this->params['breadcrumbs'][] = ['label' => 'Respuestas por Evento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?><div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>
