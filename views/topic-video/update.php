<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TopicVideo */

$this->title = 'Update Topic Video: ' . ' ' . $model->topic_id;
$this->params['breadcrumbs'][] = ['label' => 'Topic Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->topic_id, 'url' => ['view', 'topic_id' => $model->topic_id, 'video_id' => $model->video_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="topic-video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
