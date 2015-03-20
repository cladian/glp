<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */

$this->title = 'Crear Tipo de Responsabilidad';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Responsabilidad', 'url' => ['index']];
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