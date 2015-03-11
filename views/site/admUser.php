<?php
use yii\helpers\Html;
use kartik\widgets\Growl;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Panel de control de usuario';
/*$this->params['breadcrumbs'][] = $this->title;*/

// http://demos.krajee.com/widget-details/growl
//http://www.bsourcecode.com/yiiframework2/gridview-in-yiiframework-2-0/

if (!$hasProfile) {
    echo Growl::widget([
        'type' => Growl::TYPE_DANGER,
        'title' => 'Perfil',
        'icon' => 'glyphicon glyphicon-exclamation-sign',
        'body' => 'Actualicela para completar su inscripción',
        'showSeparator' => true,
        'delay' => 0,
        'pluginOptions' => [
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
    ]);


}
?>
<!--<h3><? /*= Html::encode($this->title) */ ?></h3>-->
<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    //echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
    echo '<div class="alert alert-' . $key . '" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  ' . $message . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
             </div>';
}
?>
<div class="row">


    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Mis
                    incripciones</h3>
            </div>
            <div class="panel-body">
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
                        'detailUrl' => Url::to(['inscription/detailown']),
                        // 'detailRowCssClass' => \kartik\grid\GridView::TYPE_DEFAULT,
                        'pageSummary' => false,
                    ],
                    [
                        'attribute' => 'event_id',
                        'value' => function ($data) {
                            return $data->event->name;
                        }
                    ],
                    /* [
                         'attribute' => 'user_id',
                         'value' => function ($data) {
                             return $data->user->username;
                         }  'complete_logistic',
                             'complete_eventquiz',
                            'complete_quiz',
                     ],*/
/*                    [
                        'attribute' => 'created_at',
                    ],*/
                    [
                        'attribute' => 'complete_logistic',
                    ],
                    [
                        'attribute' => 'complete_eventquiz',
                    ],
                    [
                        'attribute' => 'complete_quiz',
                    ],
                    [
                        'class' => '\kartik\grid\BooleanColumn',
                        'attribute' => 'status',
                        'trueLabel' => '10',
                        'falseLabel' => '0'
                    ],


                ];

                echo \kartik\grid\GridView::widget([
                    'dataProvider' => $dataInscription,
                    'filterModel' => $searchInscription,
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

                            // 'registertype_type',
                            // 'registertype_assigment',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); */

                ?>
            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    Notificaciones</h3>
            </div>
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataNotification,
                    'filterModel' => $searchNotification,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'text:ntext',
                        'status',
                        'user_id',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-primary">

            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"> </span> Eventos
                    disponibles ASOCAM</h3>
            </div>

            <div class="panel-body">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php foreach ($modelEvent as $event) { ?>
                        <div class="panel panel-info">
                            <div class="panel-heading" role="tab" id="heading<?= $event->id; ?>">

                                    <?= Html::img('imgs/flags/24/' . strtolower($event->country->iso) . '.png'); ?>
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse<?= $event->id; ?>" aria-expanded="false"
                                       aria-controls="collapse<?= $event->id; ?>">
                                        <?= $event->name; ?>,
                                        <!--<i><?/*= $event->city; */?>-<?/*= $event->country->name; */?></i>-->

                                    </a>

                                    <small><?= Yii::$app->formatter->asDate($event->begin_at, 'long'); ?></small>

                            </div>
                            <div id="collapse<?= $event->id; ?>" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading<?= $event->id; ?>">
                                <div class="panel-body">

                                    <p><?= $event->short_description; ?></p>
                                    <!-- <p><?php /*echo $timeDiff;*/ ?></p>-->
                                    <address>
                                        <strong><?= $event->city . ', ' . $event->country->name; ?></strong><br>
                                        <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($event->begin_at, 'long'); ?>
                                        <br>
                                        <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($event->end_at, 'long'); ?>
                                        <br>
                                        <strong>Inversión: </strong><?= $event->cost; ?> USD
                                    </address>
                                    <?= Html::a('Inscribirme', ['inscription/createown/', 'id' => $event->id], ['class' => 'btn btn-success btn-lg btn-block']) ?>
                                    <?= Html::a('Más información', ['site/event/', 'id' => $event->id], ['class' => 'btn btn-default btn-lg btn-block']) ?>
                                    

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>

    </div>

</div>