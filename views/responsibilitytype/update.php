<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Responsibilitytype */

$this->title = 'Actualización Tipo de Resposibilidad: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Responsabilidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="responsibilitytype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
