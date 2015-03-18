<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventanswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Respuestas por Evento';
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
            'reply:ntext',
            'inscription_id',
            'eventquestion_id',
//            'created_at',
            // 'updated_at',
            // 'status',

//            ['class' => 'yii\grid\ActionColumn'],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['eventanswer/view', 'id' => $key]);
                        },
                    'update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['eventanswer/update', 'id' => $key]);
                        },

                ]
            ],

        ],

    ]); ?>
  </div>
</div>
<div class="eventanswer-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Respuesta por Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    

</div>
