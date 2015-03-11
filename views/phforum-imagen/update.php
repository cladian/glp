<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhforumImagen */

$this->title = 'Update Phforum Imagen: ' . ' ' . $model->phforum_id;
$this->params['breadcrumbs'][] = ['label' => 'Phforum Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->phforum_id, 'url' => ['view', 'phforum_id' => $model->phforum_id, 'imagen_id' => $model->imagen_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phforum-imagen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
