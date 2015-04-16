<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="answer-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?
    $gridColumns = [
        // the name column configuration
        [
            'class' => '\kartik\grid\SerialColumn',
            'contentOptions'=>['class'=>'kartik-sheet-style'],
        ],
//        [
//            'class' => 'kartik\grid\EditableColumn',
//            'readonly' => true,
//            'attribute' => 'question_id',
//            'value' => function ($data) {
//                return $data->question->text;
//            }
//
//        ],
//        [
//            'class' => 'kartik\grid\EditableColumn',
//            'readonly' => true,
//            'attribute' => 'reply',
//            'value' => 'reply',
//
//        ],
        [
            'attribute' => 'question_id',
            'value' => function ($data) {
                    return $data->question->text;
                }
        ],
        [
            'attribute' => 'reply',
            'value' => function ($data) {
                    return $data->reply;
                }
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
//            'question_id',
            [
                'attribute' => 'question_id',
                'value'=> function ($data){ return $data->question->question->text;}
            ],
            'reply:ntext',
//            'created_at',
            // 'updated_at',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>

</div>
