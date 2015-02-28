<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Eventanswer */

$this->title = 'Crear Respuesta por Evento';
$this->params['breadcrumbs'][] = ['label' => 'Eventanswers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventanswer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
