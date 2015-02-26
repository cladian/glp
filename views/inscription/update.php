<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = 'Actualización de  Inscripción: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="inscription-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
