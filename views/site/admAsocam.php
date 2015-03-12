<?php
use yii\helpers\Html;
use kartik\widgets\Growl;

use yii\grid\GridView;

/* @var $this yii\web\View */
/*$this->title = 'Bienvenido ASOCAM';
$this->params['breadcrumbs'][] = $this->title;*/

// http://demos.krajee.com/widget-details/growl

if (!$hasProfile){
    echo Growl::widget([
        'type' => Growl::TYPE_WARNING,
        'title' => 'Perfil de usario incompleto',
        'icon' => 'glyphicon glyphicon-exclamation-sign',
        'body' => 'Actualicelo inmediatamente',
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
<div class="hidden-xs">
    <!--<h3><?/*= Html::encode($this->title) */?></h3>-->
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
<!--Panel-->        
        <div class="hidden-xs col-xs-6 col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i style="font-size:5em;"class="glyphicon glyphicon-user"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $activeUsers; ?></div>
                            <div>Usuarios</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?= Html::a('Ver más..',['user/index'])?></span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
<!--END Panel-->
<!--Panel-->        
        <div class="hidden-xs col-xs-6 col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i style="font-size:5em;"class="glyphicon glyphicon-tasks"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $activeEvents; ?></div>
                            <div>Eventos</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?= Html::a('Ver más..',['event/index'])?></span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
<!--END Panel-->
<!--Panel-->        
        <div class="hidden-xs col-xs-6 col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i style="font-size:5em;"class="glyphicon glyphicon-pencil"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $activeInscriptions; ?></div>
                            <div>Inscripciones</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?= Html::a('Ver todas..',['inscription/index'])?></span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
<!--END Panel-->
<!--Panel-->        
        <div class="hidden-xs col-xs-6 col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i style="font-size:5em;"class="glyphicon glyphicon-eye-open"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $ownInscriptions; ?></div>
                            <div>Mis Inscripciones</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><?= Html::a('Ver todas..',['site/admuser'])?></span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
<!--END Panel-->
    </div>
</div>

<!--<div class="col-xs-12 col-lg-8 col-md-8 col-md-8">
    <div class="panel panel-green">
      <div class="panel-heading">Inscripciones activas</div>
      <br>
  <div class="panel-body">
        <div class="inscription-index">

    
    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'exposition',
           // 'service_terms',
            'complete',
            'status',
            // 'created_at',
            // 'updated_at',
            // 'complete_logistic',
            // 'complete_eventquiz',
            // 'complete_quiz',
             'event_id',
            // 'user_id',
            // 'registertype_type',
            // 'registertype_assigment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
    </div>
    </div>

</div>
</div>-->

<div class="col-xs-12 col-lg-4 col-md-4 col-lg-4">

        <!-- /.panel -->
                    <div class="chat-panel panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Solicitudes por atender
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <?php foreach($modelRequest as $request){?>
                                    <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                      <?= Html::img($request->inscription->user->profiles->getImageUrl(), ['class' => 'img-circle','style'=>'height:50px;']); ?>
                                    </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="green-font"><?= $request->inscription->user->username?></strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> <?= Yii::$app->formatter->asDate($request->created_at, 'long'); ?>
                                                </small>
                                            </div>
                                            <p>
                                                <?= $request->question; ?>

                                            </p>


                                            <?= Html::a('Responder', ['reply/create'], ['class' => 'btn btn-green btn-xs pull-right']) ?>
                                        </div>
                                    </li>
                                <?php

                                }
                                ?>


                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <button class="btn btn-warning btn-md" id="btn-chat">
                                    Ver todas
                                </button>
                               <!-- <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">

                                </span>-->
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->            

</div>
<div class="col-xs-12 col-lg-4 col-md-4 col-lg-4">

        <!-- /.panel -->
                    <div class="chat-panel panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Solicitudes por atender
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <?php foreach($modelRequest as $request){?>
                                    <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                      <?= Html::img($request->inscription->user->profiles->getImageUrl(), ['class' => 'img-circle','style'=>'height:50px;']); ?>
                                    </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="green-font"><?= $request->inscription->user->username?></strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> <?= Yii::$app->formatter->asDate($request->created_at, 'long'); ?>
                                                </small>
                                            </div>
                                            <p>
                                                <?= $request->question; ?>

                                            </p>


                                            <?= Html::a('Responder', ['reply/create'], ['class' => 'btn btn-green btn-xs pull-right']) ?>
                                        </div>
                                    </li>
                                <?php

                                }
                                ?>


                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <button class="btn btn-warning btn-md" id="btn-chat">
                                    Ver todas
                                </button>
                               <!-- <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">

                                </span>-->
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->

</div><div class="col-xs-12 col-lg-4 col-md-4 col-lg-4">

        <!-- /.panel -->
                    <div class="chat-panel panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Solicitudes por atender
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <?php foreach($modelRequest as $request){?>
                                    <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                      <?= Html::img($request->inscription->user->profiles->getImageUrl(), ['class' => 'img-circle','style'=>'height:50px;']); ?>
                                    </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="green-font"><?= $request->inscription->user->username?></strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> <?= Yii::$app->formatter->asDate($request->created_at, 'long'); ?>
                                                </small>
                                            </div>
                                            <p>
                                                <?= $request->question; ?>

                                            </p>


                                            <?= Html::a('Responder', ['reply/create'], ['class' => 'btn btn-green btn-xs pull-right']) ?>
                                        </div>
                                    </li>
                                <?php

                                }
                                ?>


                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <button class="btn btn-warning btn-md" id="btn-chat">
                                    Ver todas
                                </button>
                               <!-- <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">

                                </span>-->
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->

</div>



