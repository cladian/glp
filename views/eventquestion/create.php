<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Eventquestion */

$this->title = 'Crear Pregunta de Evento';
$this->params['breadcrumbs'][] = ['label' => 'Preguntas por Evento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventquestion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
