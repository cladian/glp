<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\EventquestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preguntas por Evento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-green">
  <div class="panel-heading"><?= Html::encode($this->title) ?></div>
  <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'status',
//            'created_at',
//            'updated_at',
//            'eventtype_id',
/*            [
                'attribute' => 'eventtype_id',
                'value'=> function ($data){ return $data->eventtype->name;}
            ],*/
            'text',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>

<div class="eventquestion-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Pregunta por Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    

</div>
