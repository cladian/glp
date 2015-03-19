<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstitutiontypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Institución';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutiontype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Institución', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'description:ntext',
            'status',
//            'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */

    // the grid columns setup (only two column entries are shown here
    // you can add more column entries you need for your use case)
    $gridColumns = [
        // the name column configuration
        [
            'class' => '\kartik\grid\SerialColumn'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'name',
            'pageSummary' => true,

            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status==10); // do not allow editing of inactive records
            },
            'editableOptions' => [
                'header' => 'Nombre',
                'size'=>'md',
                'inputType' => \kartik\editable\Editable::INPUT_TEXTAREA,
                'class'=>'text-danger',
                'format' => Editable::FORMAT_BUTTON,
                /*'options' => [
                    'pluginOptions' => ['min' => 0, 'max' => 5000]
                ]*/
            ],/*,
            'editableOptions'=> function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Name',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) use ($model, $index) {
                        return $form->field($model, "color")->widget(\kartik\widgets\ColorInput::classname(), [
                            'showDefaultPalette' => false,
                            'options'=>['id'=>"color-{$index}"],
                            'pluginOptions' => [
                                'showPalette' => true,
                                'showPaletteOnly' => true,
                                'showSelectionPalette' => true,
                                'showAlpha' => false,
                                'allowEmpty' => false,
                                'preferredFormat' => 'name',
                                'palette' => [
                                    [
                                        "white", "black", "grey", "silver", "gold", "brown",
                                    ],
                                    [
                                        "red", "orange", "yellow", "indigo", "maroon", "pink"
                                    ],
                                    [
                                        "blue", "green", "violet", "cyan", "magenta", "purple",
                                    ],
                                ]
                            ],
                        ]);
                    }
                ];
            }*/
        ],
        // the buy_amount column configuration
        [
            'class' => '\kartik\grid\BooleanColumn',
            'attribute' => 'status',
            'trueLabel' => '1',
            'falseLabel' => '0'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'status',
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status == 10); // do not allow editing of inactive records
            },


            'editableOptions' => [
                'header' => 'Buy Amount',
                'inputType' => \kartik\editable\Editable::INPUT_SPIN,
                /*'options' => [
                    'pluginOptions' => ['min' => 0, 'max' => 5000]
                ]*/
            ],
            'hAlign' => 'right',
            'vAlign' => 'right',
            //'width' => '100px',
            // 'format' => ['decimal', 2],

        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'status',
            'pageSummary' => true
        ],
//        [   // Botones de acción
//            'class' => '\kartik\grid\ActionColumn',
//            'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>']
//        ],

        ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view} {update}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['institutiontype/view', 'id' => $key]);
                    },
                'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['institutiontype/update', 'id' => $key]);
                    },

            ]
        ],

        [

            'attribute'=>'status',

            'filter'=>array("10"=>"Active","0"=>"Inactive"),

            //TblCategory::get_status(),

        ],
        [
            'attribute' => 'created_at',
           // 'format' => ['raw', 'Y-m-d H:i:s'],
            //'format' =>  ['date', 'php:Y-m-d H:i:s'],
            'options' => ['width' => '200']
        ],




    ];

    // the GridView widget (you must use kartik\grid\GridView)
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        // set your toolbar
        'toolbar' =>  [

            '{export}',
            '{toggleData}',
        ],
        'bordered' => true,
        'resizableColumns'=>true,
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

    ?>


</div>
