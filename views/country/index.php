<?php

use yii\helpers\Html;
//use yii\grid\GridView;


use kartik\grid\GridView;
use kartik\editable\Editable;


/* @var $this yii\web\View */
/* @var $searchModel app\controllers\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'color',
            'iso',
           // 'phonecode',
            'is_event_city',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
<?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'name',
        'pageSummary' => 'Page Total',
        'vAlign'=>'middle',
/*        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],*/
        'editableOptions'=>['header'=>'Name', 'size'=>'md']
    ],
    [
        'attribute'=>'color',
        'value'=>function ($model, $key, $index, $widget) {
            return "<span class='badge' style='background-color: {$model->color}'> </span>  <code>" .
            $model->color . '</code>';
        },
        'filterType'=>GridView::FILTER_COLOR,
        'vAlign'=>'middle',
        'format'=>'raw',
        'width'=>'150px',
        'noWrap'=>true
    ],

];

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    'beforeHeader'=>[
        [
            'columns'=>[
                ['content'=>'Header Before 1', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
                ['content'=>'Header Before 2', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
                ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
            ],
            //'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],
    /*'toolbar' =>  [
        ['content'=>
            Html::button('&lt;i class="glyphicon glyphicon-plus">&lt;/i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Add Book'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
           // Html::a('&lt;i class="glyphicon glyphicon-repeat">&lt;/i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::('kvgrid', 'Reset Grid')])
        ],
        '{export}',
        '{toggleData}'
    ],*/
    'pjax' => true,
    'bordered' => true,
    'striped' => false,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    /*'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],*/
    'showPageSummary' => true,
    'panel' => [
        'type' => GridView::TYPE_PRIMARY
    ],
]);

?>

</div>
