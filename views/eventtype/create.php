<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Eventtype */

$this->title = 'Crear Tipo de Evento';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Evento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
