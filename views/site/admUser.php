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

/*if (!$hasProfile) {
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


}*/
?>

<!-- EVENTOS-->
<div class="col-xs-12 col-lg-4 col-md-4">

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
                                <!--<br>-->
                                <!--   <strong>Finaliza: </strong><? /*= Yii::$app->formatter->asDate($event->end_at, 'long'); */ ?>
                                <br>-->
                                <!--<strong>Inversión: </strong><? /*= $event->cost; */ ?> USD-->
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
            Listado de próximos eventos
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

<div class="col-xs-12 col-lg-8 col-md-8 col-lg-8">

    <!-- /.panel  CENTRAL-->
    <div class="chat-panel panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>
            Mis Inscripciones
            <?= Html::a('ver todas', ['inscription/indexown'], ['class' => 'btn btn-default btn-xs pull-right']) ?>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>#</th>
                        <th>Evento</th>
                        <th>Avance</th>

                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $contador = 1;
                    foreach ($modelRecentInscription as $recent) {
                        $class = '';
                        if ($recent->complete == 100)
                            $class = 'success';
                        ?>
                        <tr class="<?= $class; ?>">
                            <td><?= $contador++; ?></td>
                            <td><?= substr($recent->event->name, 0, 40) . '...'; ?></td>

                            <!--<td><? /*= $recent->user->username; */ ?></td>-->
                            <td><?= $recent->complete; ?>%</td>
                            <!--<td> <? /*= Yii::$app->formatter->asDate($recent->created_at, 'short'); */ ?></td>-->
                            <td>

                                <?= Html::a(' Ver  ', ['inscription/viewown', 'id' => $recent->id], ['class' => 'glyphicon glyphicon-eye-open btn btn-default  btn-xs']) ?>
                                <?= Html::a(' Nueva Pregunta  ', ['request/createown', 'inscription_id' => $recent->id], ['class' => 'glyphicon glyphicon-comment btn btn-default  btn-xs']) ?>


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
            Listado de las inscripciones del participante
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
                if (!$modelRecentInscription) {
                    ?>
                    <li> No existen Solicitudes</li>
                <?php
                }
                // $modelRequest=\app\models\Request::find()
                foreach ($modelRecentInscription as $inscription) {

                    foreach (\app\models\Request::find()->where(['inscription_id' => $inscription->id, 'status' => 1])->orderBy('created_at desc')->all() as $request) {
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
                                <p> <?= $request->question; ?></p>
                                <?= Html::a('Responder', ['reply/create', 'id' => $request->id], ['class' => 'btn btn-default btn-xs pull-right']) ?>
                            </div>
                        </li>
                        <?php
                        $modelReply = \app\models\Reply::find()->where(['request_id' => $request->id])->orderBy('created_at desc')->limit(3)->all();
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
                    }
                }
                ?>
            </ul>
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            Últimas actividades
        </div>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->

</div>


<div class="col-xs-12 col-md-4 col-lg-4">

    <!-- /.panel  CENTRAL-->
    <div class="chat-panel panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>
            Aportes en Foros
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">

        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            Últimos aportes de foros
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
            Datos del Participante
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <?php if ($hasProfile) { ?>

                <div style="width: 30%" class="pull-right">
                    <?= Html::img($modelProfile->getImageUrl(), ['class' => 'img-responsive img-thumbnail']); ?>
                    <span
                        align="center"> <?= Html::img('imgs/flags/24/' . strtolower($modelProfile->country->iso) . '.png'); ?></span>
                </div>

                <h5><?= $modelProfile->name ?>
                <br/><?= $modelProfile->lastname; ?></h5>
                <address>

                    <strong>Teléfono: </strong><?= $modelProfile->phone_number; ?> <br>
                    <strong>Movil: </strong><?= $modelProfile->mobile_number; ?><br>
                    <strong>Correo: </strong><?= $modelProfile->user->email; ?> <hr/>
                    <strong>Responzabilidad: </strong><?= $modelProfile->responsability_name; ?> <br>
                    <strong>Tipo: </strong><?= $modelProfile->responsibilitytype->name; ?> <br>

                    <strong>Institución: </strong><?= $modelProfile->institution_name; ?> <br>
                    <strong>Tipo: </strong><?= $modelProfile->institutiontype->name; ?>

                </address>
            <?php } else
            { ?>
<!--                --><?//= Html::img(Yii::$app->params['avatarFolder'] . 'profile.png', ['class' => 'img-responsive img-thumbnail img-block']); ?>

                <div class="alert alert-danger"  role="alert"><span class="glyphicon glyphicon-alert pull-right"  aria-hidden="true"></span>La información de su registro está incompleta, por favor proporcione sus datos através del siguiente  formulario.</div>
                <?= Html::a('Crear Perfil', ['profile/createown/', 'id' => $event->id], ['class' => 'btn btn-success btn-xs ']) ?>
                <address>
                </address>
            <?php } ?>

        </div>
        <?php if ($modelProfile):?>
        <!-- /.panel-body -->
        <div class="panel-footer">

&nbsp;
            <?= Html::a('<span class="glyphicon glyphicon-floppy-disk"></span> Actualizar Perfil', ['profile/createown', 'id' => $modelProfile->id], ['class' => 'btn btn-success btn-xs pull-left  ']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-floppy-disk"></span> Cambiar Imagen', ['profile/avatarown', 'id' => $modelProfile->id], ['class' => 'btn btn-success btn-xs pull-right  ']) ?>
        </div>
        <?php endif;?>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->

</div>