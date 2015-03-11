<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TopicVideo */

$this->title = $model->topic_id;
$this->params['breadcrumbs'][] = ['label' => 'Topic Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-video-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'topic_id' => $model->topic_id, 'video_id' => $model->video_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'topic_id' => $model->topic_id, 'video_id' => $model->video_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'topic_id',
            'video_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
