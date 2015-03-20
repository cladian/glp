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

<div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <!--Panel-->
<!--        <div class=" col-xs-6 col-lg-3 col-md-6">-->
<!--            <div class="panel panel-primary">-->
<!--                <div class="panel-heading">-->
<!--                    <div class="row">-->
<!--                        <div class="col-xs-3">-->
<!--                            <i class="glyphicon glyphicon-user"></i>-->
<!--                        </div>-->
<!--                        <div class="col-xs-9 text-right">-->
<!--                            <div style="font-size:20px;" class="huge">10</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <div class="panel-footer">-->
<!--                        <span class="pull-left">Respuestas</span>-->
<!--                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>-->
<!---->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
        <!--END Panel-->
        <!--Panel-->
<!--        <div class="col-xs-6 col-lg-3 col-md-6">-->
<!--            <div class="panel panel-green">-->
<!--                <div class="panel-heading">-->
<!--                    <div class="row">-->
<!--                        <div class="col-xs-3">-->
<!--                            <i class="glyphicon glyphicon-tasks"></i>-->
<!--                        </div>-->
<!--                        <div class="col-xs-9 text-right">-->
<!--                            <div style="font-size:20px;" class="huge">5</div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <div class="panel-footer">-->
<!--                        <span class="pull-left">Notificaciones</span>-->
<!--                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>-->
<!---->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
        <!--END Panel-->
        <!--Panel-->
<!--        <div class="col-xs-6 col-lg-3 col-md-6">-->
<!--            <div class="panel panel-yellow">-->
<!--                <div class="panel-heading">-->
<!--                    <div class="row">-->
<!--                        <div class="col-xs-3">-->
<!--                            <i class="glyphicon glyphicon-pencil"></i>-->
<!--                        </div>-->
<!--                        <div class="col-xs-9 text-right">-->
<!--                            <div style="font-size:20px;" class="huge">5</div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <div class="panel-footer">-->
<!--                        <span class="pull-left">Inscripciones</span>-->
<!--                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>-->
<!---->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
        <!--END Panel-->
        <!--Panel-->
<!--        <div class="col-xs-6 col-lg-3 col-md-6">-->
<!--            <div class="panel panel-red">-->
<!--                <div class="panel-heading">-->
<!--                    <div class="row">-->
<!--                        <div class="col-xs-3">-->
<!--                            <i class="glyphicon glyphicon-eye-open"></i>-->
<!--                        </div>-->
<!--                        <div class="col-xs-9 text-right">-->
<!--                            <div style="font-size:20px;" class="huge">5</div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <div class="panel-footer">-->
<!--                        <span class="pull-left">Nuevas entradas en foros</span>-->
<!--                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>-->
<!---->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
        <!--END Panel-->
    </div>
</div>
<div class="col-xs-12 col-lg-4 col-md-4 col-lg-4">

    <!-- /.panel  CENTRAL-->
    <div class="chat-panel panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>
            Mis inscripciones
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>#</th>
                        <th>Evento</th>
                        <th>Usuario</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $contador = 1;
                    foreach ($modelRecentInscription as $recent) {
                        ?>
                        <tr>
                            <td><?= $contador++; ?></td>
                            <td><?= substr($recent->event->name, 0, 15) . '...'; ?></td>

                            <td><?= $recent->user->username; ?></td>
                            <!--<td> <? /*= Yii::$app->formatter->asDate($recent->created_at, 'short'); */ ?></td>-->
                            <td>

                                <?= Html::a(' Ver', ['inscription/viewown', 'id' => $recent->id], ['class' => 'glyphicon glyphicon-eye-open btn btn-default  btn-xs']) ?>


                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            <?= Html::a(\Yii::$app->params['btnVisualizar'], ['inscription/indexown'], ['class' => 'btn btn-default btn-block']) ?>
            <!--<a href="#" class="btn btn-default btn-block">View All Alerts</a>-->
        </div>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->

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
           <!-- <div class="input-group">
                <input id="btn-input" type="text" class="form-control input-sm"
                       placeholder="Type your message here..."/>

                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
            </div>-->
        </div>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->

</div>

<div class="col-xs-12 col-lg-4 col-md-4 col-lg-4">

    <!-- /.panel -->
    <div class="chat-panel panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>
            Solicitudes por atender
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="chat">
                <?php
                // $modelRequest=\app\models\Request::find()
                foreach ($modelRecentInscription as $inscription) {

                    foreach (\app\models\Request::find()->where(['inscription_id' => $inscription->id,'status'=>1])->orderBy('created_at desc')->all() as $request) {
                        ?>
                        <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                      <?= Html::img($request->inscription->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:50px;']); ?>
                                    </span>

                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="green-font"><?= $request->inscription->user->username ?></strong>
                                    <small class="pull-right text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i> <?= Yii::$app->formatter->asDate($request->created_at, 'long'); ?>
                                    </small>
                                </div>
                                <p>
                                    <?= $request->question; ?>


                                </p>


                                <?= Html::a('Responder', ['reply/create', 'id' => $request->id], ['class' => 'btn btn-default btn-xs pull-right']) ?>


                            </div>
                        </li>
                        <?php
                        $modelReply=\app\models\Reply::find()->where(['request_id' => $request->id])->orderBy('created_at desc')->limit(3)->all();
                        foreach ($modelReply as $reply) {
                            ?>
                            <li class="right ">
                                    <span class="chat-img pull-right">
                                        <?= Html::img($reply->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:50px;']); ?>
                                    </span>

                                <div class="chat-body clearfix">
                                    <div class="header">

                                        <strong class="pull-right primary-font"><?= $reply->user->username ?></strong>
                                    </div>
                                    <p>
                                        <?= $reply->text; ?>
                                    </p>
                                    <small class=" text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i> <?= Yii::$app->formatter->asDate($reply->created_at, 'long'); ?>
                                    </small>
                                </div>
                            </li>
                            <?php

                        }
                        ?>


                    <?php
                    }


                    ?>



                <?php
                }
                ?>


            </ul>
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            <!--<div class="input-group">
                <button class="btn btn-warning btn-md" id="btn-chat">
                    Ver todas
                </button>

            </div>-->
        </div>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->

</div>




