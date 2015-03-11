<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostImagen */

$this->title = 'Update Post Imagen: ' . ' ' . $model->post_id;
$this->params['breadcrumbs'][] = ['label' => 'Post Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->post_id, 'url' => ['view', 'post_id' => $model->post_id, 'imagen_id' => $model->imagen_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-imagen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
