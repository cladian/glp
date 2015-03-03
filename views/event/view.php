<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
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
//            'id',
            'name',
            'short_description:ntext',
            'general_content:ntext',
            'methodology:ntext',
            'addressed_to:ntext',
            'included:ntext',
            'requirements:ntext',
            'file:ntext',
            'photo:ntext',
            'url:ntext',
            'begin_at',
            'end_at',
            'city',
            'cost',
            'discount',
            'discount_end_at',
            'discount_description',
            'year',
            'status',
//            'created_at',
//            'updated_at',
//            'country_id',
            [                    // the owner name of the model
                'label' => 'Pais',
                'value' => $model->country->name,
            ],
//            'eventtype_id',
            [                    // the owner name of the model
                'label' => 'Tipo de Evento',
                'value' => $model->eventtype->name,
            ],
        ],
    ]) ?>

</div>
