<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Evento',
//                'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialEvent',['model'=>$model]),
                'active' => true
            ],
            [
                'label' => 'Preguntas del Evento',
//                  'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialEventquestion',['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel,'eventtype_id'=>$model->eventtype_id,'event_id'=>$model->id]),
//                 'options' => ['id' => 'myveryownID'],
            ],
        ],
    ]) ?>

</div>
