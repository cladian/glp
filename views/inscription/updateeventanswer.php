<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Eventanswer */

$this->title = 'Actualizar Respuesta por Evento: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Respuestas por Evento', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualziación';
?>
<div class="eventanswer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formeventanswer', [
        'model' => $model,
    ]) ?>

</div>
