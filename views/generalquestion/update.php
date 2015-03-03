<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Generalquestion */

$this->title = 'Actualizar Pregunta General: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Preguntas Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="generalquestion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
