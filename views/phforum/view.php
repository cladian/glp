<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Phforum */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Phforums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phforum-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            'begin_at',
            'end_at',
            'meeting_at',
            'memory_at',
            'content:ntext',
            'topic_number',
            'event_id',
            'status',
            'created_at',
            'updated_at',
            'is_private',
        ],
    ]) ?>

</div>
