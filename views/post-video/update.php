<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostVideo */

$this->title = 'Update Post Video: ' . ' ' . $model->post_id;
$this->params['breadcrumbs'][] = ['label' => 'Post Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->post_id, 'url' => ['view', 'post_id' => $model->post_id, 'video_id' => $model->video_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
