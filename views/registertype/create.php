<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Registertype */

$this->title = 'Crear Tipo de Registro';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Registro', 'url' => ['index']];
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