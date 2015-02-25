<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inscriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscription-view">

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
            'exposition',
            'service_terms',
            'complete',
            'status',
            'created_at',
            'updated_at',
            'complete_logistic',
            'complete_eventquiz',
            'complete_quiz',
            'event_id',
            'user_id',
            'registertype_type',
            'registertype_assigment',
        ],
    ]) ?>

</div>
