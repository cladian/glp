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

    <!--<h2>Registro de Inscripción #<?= Html::encode($this->title) ?></h2>-->

<div class="col-sm-12 col-xs-12 col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
            Llegada al lugar del evento</div>
        <div class="panel-body">
            <address>
                <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                <strong>Default: </strong><?= $model->exposition; ?><br>
                <strong>Default: </strong><?= $model->service_terms; ?><br>
                <strong>Default: </strong><?= $model->complete; ?><br>
                <strong>Default: </strong><?= $model->status; ?><br>
                


            </address>
        </div>
    </div>
</div>

   <!-- <?= DetailView::widget([
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
    ]) ?>-->
<div class="panel-body">
    <p>
            <?= Html::a('Actualizar', ['updateown', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <!--        --><?/*= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) */?>
    </p>
</div>
</div>
    
    