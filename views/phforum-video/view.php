<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PhforumVideo */

$this->title = $model->phforum_id;
$this->params['breadcrumbs'][] = ['label' => 'Phforum Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phforum-video-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'phforum_id' => $model->phforum_id, 'video_id' => $model->video_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'phforum_id' => $model->phforum_id, 'video_id' => $model->video_id], [
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
            'phforum_id',
            'video_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
