<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use miloschuman\highcharts\Highmaps;
use yii\web\JsExpression;
use app\models\Event;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InscriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripciones';
/*$this->params['breadcrumbs'][] = $this->title;*/
?>


<div class="breadcrumb">

    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/site/index'], ['class' => 'btn btn-default']) ?>
    <?php
    echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Descargar Inscripciones (Excel)', ['/inscription/excelevent', 'id' => $id], [
        'class' => 'btn btn-success',
        'target' => '_blank',
        'data-toggle' => 'tooltip',


    ]);
    ?>



    <!-- <!-- AYUDA-->
    <?php
    /*    Modal::begin([
            'header' => '<h4>Inscripción</h4>',
            'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
        ]);

        echo $this->render('/help/inscription-index');
        Modal::end();
        */
    ?>
</div>
<div class="tabs-x align-center tabs-above tab-bordered">
<ul class="nav nav-tabs">
    <li class="active"><a href="#one2" data-toggle="tab">Inscripciones</a></li>
    <li><a href="#dos" data-toggle="tab">Pais</a></li>
    <li><a href="#tres" data-toggle="tab">Género</a></li>
    <!--    <li><a href="#four2" data-toggle="tab">Videos</a></li>-->
    <!--    <li><a href="#five2" data-toggle="tab">Imagenes</a></li>-->
</ul>
<div class="tab-content">
<div class="tab-pane active" id="one2">
    <br/>

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
                /*       'attribute' => 'event_id',
                       'value' => function ($data) {
                           return $data->event->name;
                       }*/
                'attribute' => 'event_id',
                'vAlign' => 'middle',
                'value' => function ($model) {
                    return $model->event->name;
                },
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Event::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'filterInputOptions' => ['placeholder' => 'Todos'],
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],

            ],
            [
                'attribute' => 'user_id',
                'value' => function ($data) {
                    return $data->user->username;
                }
            ],

            [
                'attribute' => 'complete',
//            'headerOptions' => ['style'=>'align:center'],
//            'vAlign' => 'middle',
                'value' => function ($data) {
                    return $data->complete . "%";
                }
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
//        [
//            'class' => 'kartik\grid\ActionColumn',
//
//        ],

            /*['class' => 'kartik\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['inscription/view', 'id' => $key]);
                        },
                    'update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['inscription/update', 'id' => $key]);
                        },

                ]
            ],*/

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
                /*            ['content' =>
                                Html::a('Create Employee', ['create'], ['class' => 'btn btn-default'])
                            ],*/
                '{export}',
            ],

        ]);



        ?>

    </div>
</div>



<div class="tab-pane  panel panel-default" id="dos">
    <div class="panel-body">
        <?php

        $sql = "SELECT  LOWER(c.iso) as 'hc-key', count(i.id)as 'value'
FROM inscription as i, user as u, profile as p, country as c
where i.status=1 and u.id=i.user_id and p.user_id=u.id and p.country_id=c.id
group by u.id";


        $this->registerJsFile('http://code.highcharts.com/mapdata/custom/world.js', [
            'depends' => 'miloschuman\highcharts\HighchartsAsset'
        ]);
        $db = Yii::$app->db;
        $dbdata = $db->createCommand($sql)->queryAll();

        echo Highmaps::widget([
            'options' => [
                'title' => [
                    'text' => 'Inscripciones Generales por Pais',
                    'enabled' => false,
                ],
                'mapNavigation' => [
                    'enabled' => true,
                    'buttonOptions' => [
                        'verticalAlign' => 'left',
                    ]
                ],
                'colorAxis' => [
                    'min' => 0,
                ],

                'series' => [
                    ['enabled' => true,
                        'data' => $dbdata,
                        'mapData' => new JsExpression('Highcharts.maps["custom/world"]'),
                        'joinBy' => 'hc-key',
                        'name' => '',
                        'states' => [
                            'hover' => [
                                'color' => '#BADA55',
                            ]
                        ],
                        'dataLabels' => [
                            'enabled' => false,
                            'format' => '{point.name}',
                            'joinBy' => ['iso-a2', 'code'],
                        ]
                    ]
                ]
            ]
        ]);
        ?>
        </div>
    </div>

<div class="tab-pane  panel panel-default" id="tres">
    <div class="panel-body">
        <?php
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
                'themes/grid-light',
            ],
            'options' => [
                'title' => [
                    'text' => 'Por Género',
                ],
                // PAISES
                'xAxis' => [
                    'categories' => $arr['pais'],
                ],
                'labels' => [
                    'items' => [
                        [
                            'html' => 'Género / Paises',
                            'style' => [
                                'left' => '50px',
                                'top' => '18px',
                                'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                            ],
                        ],
                    ],
                ],
                'series' => [
                    [
                        'type' => 'column',
                        'name' => 'Masculino',
                        'data' => $arr['M'],
                    ],
                    [
                        'type' => 'column',
                        'data' => $arr['F'],
                        'name' => 'Femenino',

                    ],


                    [
                        'type' => 'pie',
                        'name' => 'Total',
                        'data' => [
                            [
                                'name' => 'Masculino',
                                'y' => $masculino,
                                'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
                            ],
                            [
                                'name' => 'Femenino',
                                'y' => $femenino,
                                'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
                            ],

                        ],
                        'center' => [100, 80],
                        'size' => 100,
                        'showInLegend' => false,
                        'dataLabels' => [
                            'enabled' => true,
                        ],
                    ],
                ],
            ]
        ]);
        ?>
    </div>
</div>
</div>


<!--<div class="tab-pane" id="four2">-->
<!---->
<!--   ghjghj-->
<!---->
<!--</div>-->
<!---->
<!--<div class="tab-pane" id="five2">-->
<!---->
<!--  ghj-->
<!---->
<!--</div>-->

</div>
</div>