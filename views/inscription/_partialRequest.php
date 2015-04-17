<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes';
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="request-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'question:ntext',
           'answer:ntext',
//            'status',
            [
                'attribute' => 'status',
                /* 'value'=> function ($data){ return $data->question->text;}*/
                'filter' => [1 => 'ACTIVO', 2 => 'INACTIVO', 0 => 'ELIMINADO'],
                'value' => function ($model) {
                        if ($rel = $model->getStatus($model->status)) {
                            return $rel;
                        }
                    },
            ],
//            'created_at',
            // 'updated_at',
           // 'inscription_id',


            /*['class' => 'yii\grid\ActionColumn'],*/
        ],
    ]); ?>
<div class="panel-body">
    <p>

    </p>
</div>
</div>
