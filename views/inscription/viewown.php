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
    <?= Html::a(\Yii::$app->params['btnNuevaInquietud'], ['request/createown', 'inscription_id' => $model->id], ['class' => 'btn btn-info']) ?>
    <!-- AYUDA-->
    <?php
    Modal::begin([
        'header' => '<h4>Inscripción</h4>',
        'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
    ]);

    echo $this->render('/help/inscription-index');
    Modal::end();
    ?>
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
                        Inscripción
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
                        Preguntas por evento
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
                        Preguntas generales
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
                        Total
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

    <!--END Visualización evento-->

</div>


<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">


    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">

                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                Información de Inscripción <span class="pull-right"><?= $model->complete; ?>%


            </h5>
        </div>

        <div class="panel-body">
            <?= $this->render('_partialInscription', ['model' => $model, 'modelProfile' => $modelProfile]) ?>


        </div>
        <div class="panel-heading" >
        <h4 class="panel-title">
            <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>

                Información logística

        </h4>
    </div>
        <div class="panel-body">
            <?= $this->render('_partialLogistic', ['model' => $modelLogistic]) ?>
        </div>

    </div>




    <div class="panel panel-success">
        <div class="panel-heading" role="tab" id="heading5">
            <h4 class="panel-title">
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>

                   Inquietudes

            </h4>
        </div>

            <div class="panel-body">
                <?= $this->render('_partialRequest', ['searchModel' => $searchModelRequest, 'dataProvider' => $dataProviderRequest]); ?>

            </div>

    </div>


</div>


<!--ENDRegistro-->
