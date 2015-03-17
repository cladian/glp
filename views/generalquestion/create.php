<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Generalquestion */

$this->title = 'Crear Pregunta General';
$this->params['breadcrumbs'][] = ['label' => 'Preguntas Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>