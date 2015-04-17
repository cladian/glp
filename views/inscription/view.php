<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = $model->id;
$clase='green';
if ($model->complete <100)
    $clase='red';
?>

<div class="regresar">

</div>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])?>
    <!-- AYUDA-->
<!--    --><?php
/*    Modal::begin([
        'header' => '<h3><li class="list-group-item list-group-item-warning"> Instrucciones para completar la Inscripción</li></h3>',
        'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
    ]);

    echo $this->render('/help/inscription-index');
    Modal::end();
    */?>
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
                        Sección 2. Experiencia y expectativa.                    </div>
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
                        Avance de Incripción                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <!--Visualización información del evento-->

    <div class="panel panel-green">
        <?= $this->render('/event/_detailinfo', ['model' => $model->event]) ?>
      
    </div>

    <!--END Visualización evento-->

</div>


<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">


    <div class="panel-group" id="accordion" role="tablist">



        <div class="panel panel-green">
            <div class="panel-heading" role="tab" id="headingOne">
                <h5 class="panel-title">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                       aria-controls="collapseOne" style="color:white;">
                        Información de Inscripción <span class="pull-right"></span>
                    </a>
                </h5>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <?= $this->render('_partialInscription', ['model' => $model,'modelProfile' => $modelProfile]) ?>
                </div>
  <!--              <div class="panel-footer">
                    <?/*= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Actualizar', ['updateown', 'id' => $model->id], ['class' => 'btn btn btn-success']) */?>
                </div>-->
            </div>
        </div>



        <div class="panel panel-green">
            <div class="panel-heading" role="tab" id="headingTwo" aria-multiselectable="true">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                       aria-expanded="true" aria-controls="collapseTwo" style="color:white;">
                        Información logística
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <?= $this->render('_partialLogistic', ['model' => $modelLogistic]) ?>

                </div>
        <!--        <div class="panel-footer">
                    <?/*= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Actualizar', ['logistic/updateown', 'id' => $modelLogistic->id], ['class' => 'btn btn btn-success']) */?>
                </div>-->
            </div>
        </div>



        <div class="panel panel-green">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                       aria-expanded="false" aria-controls="collapseThree" style="color:white;">
                        Respuestas por evento
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <?= $this->render('_partialEventanswer', ['searchModel' => $searchModelEventanswer, 'dataProvider' => $dataProviderEventanswer]); ?>
                </div>
            </div>
        </div>

        <div class="panel panel-green">
            <div class="panel-heading" role="tab" id="heading4">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4"
                       aria-expanded="false" aria-controls="collapse4" style="color:white;">
                        Respuestas a preguntas generales
                    </a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                <div class="panel-body">
                    <?= $this->render('_partialAnswer', ['searchModel' => $searchModelAnswer, 'dataProvider' => $dataProviderAnswer]); ?>
                </div>
            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading" role="tab" id="heading5">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5"
                       aria-expanded="false" aria-controls="collapse5">
                        Notificaciones / Solicitudes
                    </a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                <div class="panel-body">
                    <?= $this->render('_partialRequest', ['searchModel' => $searchModelRequest, 'dataProvider' => $dataProviderRequest]); ?>
                  <!--  --><?/*= Html::a('Crear Solicitud', ['request/createown','inscription_id'=>$model->id], ['class' => 'btn btn-success']) */?>
                </div>
            </div>
        </div>


    </div>
</div>

<!--ENDRegistro-->
