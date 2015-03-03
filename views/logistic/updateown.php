<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Logistic */

$this->title = 'Actualizar Logística: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logísticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="logistic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>

</div>
