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
<div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <!--Panel-->
        <div class=" col-xs-6 col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size:20px;" class="huge">10</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Respuestas</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!--END Panel-->
        <!--Panel-->
        <div class="col-xs-6 col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-tasks"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size:20px;" class="huge">5</div>

                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Notificaciones</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!--END Panel-->
        <!--Panel-->
        <div class="col-xs-6 col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size:20px;" class="huge">5</div>

                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Inscripciones</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!--END Panel-->
        <!--Panel-->
        <div class="col-xs-6 col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size:20px;" class="huge">5</div>

                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Nuevas entradas en foros</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!--END Panel-->
    </div>
</div>
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
                    'attribute' => 'created_at',
                ],
                /*                    [
                                        'attribute' => 'complete_logistic',
                                    ],
                                    [
                                        'attribute' => 'complete_eventquiz',
                                    ],
                                    [
                                        'attribute' => 'complete_quiz',
                                    ],*/
                [
                    'class' => '\kartik\grid\BooleanColumn',
                    'attribute' => 'status',
                    'trueLabel' => 'ACTIVO',
                    'falseLabel' => 'INACTIVO'
                ],
            ];
            echo \kartik\grid\GridView::widget([
                'dataProvider' => $dataInscription,
                'filterModel' => $searchInscription,
                'columns' => $gridColumns,
                'pjax' => true, // pjax is set to always true for this demo
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
                /*'showPageSummary' => true,*/
                'persistResize' => false,
                'exportConfig' => true,
            ]);
            ?>
        </div>
    </div>
</div>
<div class="col-xs-12 col-lg-4 col-md-4 col-md-4">

    <!-- /.panel -->
    <div class="chat-panel panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>
            Próximos eventos

        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="chat">

                <?php foreach ($modelEvent as $event) { ?>
                    <li class="left clearfix">
                        <span class="chat-img pull-left">
                            <?= Html::img('imgs/flags/24/' . strtolower($event->country->iso) . '.png', ['class' => 'img-thumbnail']); ?>
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font"> <?= $event->name; ?></strong>
                                <!--<small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                </small>-->
                            </div>
                            <p>
                            <address>
                                <!--<strong><? /*= $event->city . ', ' . $event->country->name; */ ?></strong><br>-->
                                <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($event->begin_at, 'long'); ?>
                                <br>
                                <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($event->end_at, 'long'); ?>
                                <br>
                                <strong>Inversión: </strong><?= $event->cost; ?> USD
                            </address>
                            </p>
                            <?= Html::a('Inscribirme', ['inscription/createown/', 'id' => $event->id], ['class' => 'btn btn-success btn-xs ']) ?>
                            <?= Html::a('Más información', ['site/event/', 'id' => $event->id], ['class' => 'btn btn-default btn-xs ']) ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            <div class="input-group">
                <input id="btn-input" type="text" class="form-control input-sm"
                       placeholder="Type your message here..."/>

                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
            </div>
        </div>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->

</div>


