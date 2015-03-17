<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventanswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Respuestas por Evento';
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="eventanswer-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?
    $gridColumns = [
        // the name column configuration
        [
            'class' => '\kartik\grid\SerialColumn',
            'contentOptions'=>['class'=>'kartik-sheet-style'],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'readonly' => true,
            'attribute' => 'eventquestion_id',
            'value' => function ($data) {
                return $data->eventquestion->question->text;
            }

        ],

        [
            'class' => 'kartik\grid\EditableColumn',
            'readonly' => true,
            'attribute' => 'reply',
            'value' => 'reply',

        ],
        [
            'class' => '\kartik\grid\BooleanColumn',
            'attribute' => 'status',
            'trueLabel' => '1',
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





    /*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',

//            'inscription_id',
//            'eventquestion_id',
            [
                'attribute' => 'eventquestion_id',
                'value'=> function ($data){ return $data->eventquestion->question->text;}
            ],
            'reply:ntext',
//            'created_at',
            // 'updated_at',
            // 'status',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */
    ?>

</div>
