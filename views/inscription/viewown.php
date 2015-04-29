<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = $model->id;
/*$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
$clase='green';
if ($model->complete <100)
$clase='red';
?>

<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancel'], ['/site/index'], ['class' => 'btn btn-danger']) ?>

    <?= Html::a(\Yii::$app->params['btnInscriptionS1'], ['updateown', 'id' => $model->id], ['class' => 'btn btn btn-primary']) ?>
    <?= Html::a(\Yii::$app->params['btnInscriptionS2'], ['eventanswer', 'id' => $model->id], ['class' => 'btn btn btn-success']) ?>
    <?= Html::a(\Yii::$app->params['btnInscriptionS3'], ['answer', 'id' => $model->id], ['class' => 'btn btn btn-success']) ?>


    <!-- AYUDA-->
<!--    --><?php
//    Modal::begin([
//        'header' => '<h3><li class="list-group-item list-group-item-warning"> Instrucciones para completar la Inscripción</li></h3>',
//        'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
//    ]);
//
//    echo $this->render('/help/inscription-index');
//    Modal::end();
//    ?>
</div>

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
<div class="btn-group btn-group-justified" role="group" aria-label="...">


    <!--Panel-->
    <div class=" col-xs-6 col-lg-3 col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i style="font-size:2em;" class="glyphicon glyphicon-question-sign"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $model->complete_logistic; ?>%</div>
<!--                        Inscripción-->
                        Sección 1. Información General.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Panel-->
    <div class=" col-xs-6 col-lg-3 col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i style="font-size:2em;" class="glyphicon glyphicon-question-sign"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $model->complete_eventquiz; ?>%</div>
<!--                        Preguntas por evento-->
                        Sección 2. Experiencia y expectativa.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class=" col-xs-6 col-lg-3 col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i style="font-size:2em;" class="glyphicon glyphicon-question-sign"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $model->complete_quiz; ?>%</div>
<!--                        Preguntas generales-->
                        Sección 3. Preguntas Generales
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--END Panel-->
    <!--Panel-->
    <div class=" col-xs-6 col-lg-3 col-md-3">
        <div class="panel panel-<?= $clase?>">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i style="font-size:2em;" class="glyphicon glyphicon-question-sign"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $model->complete; ?>%</div>
<!--                        Total-->
                        Avance de Incripción
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">


    <div class="panel panel-primary">
        <?= $this->render('/event/_detailinfo', ['model' => $model->event]) ?>
        <div class="panel-footer">

            <!--  <?= Html::a(\Yii::$app->params['btnRegresar'], ['/site/index'], ['class' => 'btn btn-default']) ?> -->
                <span class="pull-right">



                </span>
        </div>
    </div>
    <div class="chat-panel panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>
            Inquietudes y Respuestas

        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="chat">
                <?php
                if (!$modelInscription) {
                    ?>
                    <li> No existen Solicitudes</li>
                <?php
                }
                // $modelRequest=\app\models\Request::find()
                foreach ($modelInscription as $inscription) {

                    foreach (\app\models\Request::find()->where(['inscription_id' => $inscription->id, 'status' => 1])->orderBy('created_at desc')->all() as $request) {
                        ?>
                        <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                      <?= Html::img(\Yii::$app->params['webRoot'].'/'.$request->inscription->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:50px;']); ?>
                                    </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="green-font"><?= $request->inscription->user->username ?></strong>
                                    <small class="pull-right text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i>  <?= Yii::$app->formatter->asDate($request->created_at, 'long'); ?>
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
                                        <?= Html::img(\Yii::$app->params['webRoot'].'/'.$reply->user->getImageUrl(), ['class' => 'img-circle', 'style' => 'height:50px;']); ?>
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
            <?= Html::a(\Yii::$app->params['btnNuevaInquietud'], ['request/createown', 'inscription_id' => $model->id], ['class' => 'btn btn-info btn-xs ' ]) ?>
        </div>
        <!-- /.panel-footer -->

    </div>
    <!--END Visualización evento-->

</div>


<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">


    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">

                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                Información General <span class="pull-right">
<!--                    --><?//= $model->complete; ?><!--%-->
            </h5>

        </div>

        <div class="panel-body">
            <?= $this->render('_partialInscription', ['model' => $model, 'modelProfile' => $modelProfile]) ?>


        </div>
        <div class="panel-heading" >
        <h4 class="panel-title">
            <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>

            Por favor verificar y completar información de Logística

        </h4>

    </div>


        <div class="panel-body">
            <?= $this->render('_partialLogistic', ['model' => $modelLogistic]) ?>
        </div>
        <div class="panel-footer">
            <?= Html::a(\Yii::$app->params['btnInscriptionS3SM'], ['updateown', 'id' => $model->id], ['class' => 'btn btn-info btn-xs ' ]) ?>
        </div>
    </div>



</div>


