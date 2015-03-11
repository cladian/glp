<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InscriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripciones';
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="inscription-index">
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
        [
            'class' => 'kartik\grid\ActionColumn',
        ],
        [
            'class' => 'kartik\grid\CheckboxColumn',
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],


    ];

    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        // set your toolbar

        'toolbar' => [
            ['content' =>
            //Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'nuevi', 'class'=>'btn btn-success', 'onclick'=>'ins']) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset'])
            ],
            '{export}',
            '{toggleData}',
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'panel' => [
            'type' => \kartik\grid\GridView::TYPE_PRIMARY,
            // 'heading' => $heading,
        ],

        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => true,
        'panel' => [
            'type' => \kartik\grid\GridView::TYPE_PRIMARY,
            'heading' => '<i class="glyphicon glyphicon-book"></i>  Inscripciones',
        ],
        'persistResize' => true,
/*        'exportConfig' => [
            \kartik\grid\GridView::EXCEL => [
                'label' => 'Excel',
                'icon' => 'floppy-remove',
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'worksheet' => 'ExportWorksheet',
                'filename' => 'grid-export',
                'alertMsg' => 'The EXCEL export file will be generated for download.',
                'cssFile' => '',
                'options' => 'Save as Excel'],
        ],*/
        'toolbar' => [
            ['content' =>
                Html::a('Create Employee', ['create'], ['class' => 'btn btn-default'])
            ],
            '{export}',
        ],

    ]);



    ?>

</div>
