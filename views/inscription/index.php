<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InscriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscription-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Crear Inscripción', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
// 'event_id',
            [
                'attribute' => 'event_id',
                'value'=> function ($data){ return $data->event->name;}
            ],
            // 'user_id',
            [
                'attribute' => 'user_id',
                'value'=> function ($data){ return $data->user->username;}
            ],
//            'exposition',
          //  'service_terms',
//            'complete',
            'status',
            // 'created_at',
            // 'updated_at',
            // 'complete_logistic',
            // 'complete_eventquiz',
            // 'complete_quiz',
<<<<<<< HEAD

=======
            // 'event_id',

            // 'user_id',
>>>>>>> origin/master
            // 'registertype_type',
            // 'registertype_assigment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
