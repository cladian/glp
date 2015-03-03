<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscription-view">

    <h2>Registro de Inscripción #<?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?/*= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            [
                'label'=>'Evento',
                'value' => $model->event->name,
            ],
            'exposition',
            'service_terms',
            'complete',
            'status',
//            'created_at',
/*            'updated_at',
            'complete_logistic',
            'complete_eventquiz',
            'complete_quiz',*/
//            'event_id',
//            [                    // the owner name of the model
//                'label' => 'Evento',
//                'value' => $model->event->name,
//            ],
//            'user_id',

            [
                'label'=>'Tipo de Registro',
                'value' =>$model->registertypeType->name,
            ],
            [
                'label'=>'Tipo de Asignación',
                'value' =>$model->registertypeAssigment->name,
            ],
        ],
    ]) ?>

</div>
