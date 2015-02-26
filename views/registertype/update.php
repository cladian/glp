<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Registertype */

$this->title = 'Actualización tipo de Registro: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Registro', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="registertype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
