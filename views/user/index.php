<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modelsUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="panel panel-green">-->
<!--  <div class="panel-heading">--><?//= Html::encode($this->title) ?><!--</div>-->
<!--  <div class="panel-body">-->
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//          //  'id',
//            'username',
//            //'auth_key',
//            //'password_hash',
//           // 'password_reset_token',
//             'email:email',
//             'status',
//            // 'created_at',
//            // 'updated_at',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>
<!---->
<!--  </div>-->
<!--</div>-->
<!---->
<!--<div class="user-index">-->
<!---->
<!--  -->
<!--    --><?php //// echo $this->render('_search', ['model' => $searchModel]); ?>
<!---->
<!--    <p>-->
<!---->
<!--    </p>-->
<!---->
<!--    -->
<!--</div>-->

<!---->

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
        'detailUrl' => Url::to(['user/profile']),
        // 'detailRowCssClass' => \kartik\grid\GridView::TYPE_DEFAULT,
        'pageSummary' => false,
    ],

//    [
//        /*       'attribute' => 'event_id',
//               'value' => function ($data) {
//                   return $data->event->name;
//               }*/
//        'attribute' => 'event_id',
//        'vAlign' => 'middle',
//        'value' => function ($model) {
//                return $model->event->name;
//            },
//        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
//        'filter' => ArrayHelper::map(Event::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
//        'filterInputOptions' => ['placeholder' => 'Todos'],
//        'filterWidgetOptions' => [
//            'pluginOptions' => ['allowClear' => true],
//        ],
//
//    ],
    [
        'attribute' => 'username',
//        'value' => function ($data) {
//                return $data->user->username;
//            }
    ],
    [
        'attribute' => 'email',
    ],

    [
        'attribute' => 'created_at',
    ],
    [
        'attribute' => 'status',
        'vAlign' => 'middle',
        'value' => function ($model) {
                if ($rel = $model->getStatus($model->status)) {
                    return $rel;
                }
            },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' => [1 => 'ACTIVO', 2 => 'INACTIVO', 0 => 'ELIMINADO'],
        'filterInputOptions' => ['placeholder' => 'Todos'],
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
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
    'pjax' => true, // pjax is set to always true for this demo
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
        'type' => \kartik\grid\GridView::TYPE_SUCCESS,
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
