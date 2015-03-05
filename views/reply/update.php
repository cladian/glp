<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reply */

$this->title = 'Actualizar Respuesta: ' . ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'request_id' => $model->request_id]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="reply-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
