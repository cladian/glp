<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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

    <?php
    $gridColumns = [
        // the name column configuration
        [
            'class' => '\kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
        ],
        [   //Columna para expander detalles
            'class' => 'kartik\grid\ExpandRowColumn',
            'value' => function ($model, $key, $index, $column) {
                return \kartik\grid\GridView::ROW_COLLAPSED;
            },
            'detailUrl' => Url::to(['inscription/detail']),
           // 'detailRowCssClass' => \kartik\grid\GridView::TYPE_DEFAULT,
            'pageSummary' => false,
        ],
        [
            'attribute' => 'event_id',
            'value' => function ($data) {
                return $data->event->name;
            }
        ],
        [
            'attribute' => 'user_id',
            'value' => function ($data) {
                return $data->user->username;
            }
        ],
        [
            'attribute' => 'created_at',

        ],
        [
            'class' => '\kartik\grid\BooleanColumn',
            'attribute' => 'status',
            'trueLabel' => '10',
            'falseLabel' => '0'
        ],


    ];

    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        // set your toolbar
        'toolbar' => [

            '{export}',
            '{toggleData}',
        ],
        'bordered' => true,
        'resizableColumns' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => true,
        'persistResize' => false,
        'exportConfig' => true,
        /*        'pjax'=>true,
                'floatHeader'=>true,
                'floatHeaderOptions'=>['scrollingTop'=>'50'],
                'pjaxSettings'=>[
                    'neverTimeout'=>true,
                    'beforeGrid'=>'My fancy content before.',
                    'afterGrid'=>'My fancy content after.',
                ]*/
    ]);

    /*    GridView::widget([
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
                // 'registertype_type',
                // 'registertype_assigment',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); */

    ?>

</div>
