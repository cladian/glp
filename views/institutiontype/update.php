<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Institutiontype */

$this->title = ' Actualización de: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Institución ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="institutiontype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
