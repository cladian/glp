<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Institutiontype */

$this->title = 'Crear Tipo de Institución';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Institución', 'url' => ['index']];
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