<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TopicImagen */

$this->title = 'Update Topic Imagen: ' . ' ' . $model->topic_id;
$this->params['breadcrumbs'][] = ['label' => 'Topic Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->topic_id, 'url' => ['view', 'topic_id' => $model->topic_id, 'imagen_id' => $model->imagen_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="topic-imagen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
