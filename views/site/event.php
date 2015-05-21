<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Evento:' . $modelEvent->name;

?>
<div class="breadcrumb">
    <?= Html::a(\Yii::$app->params['btnCancel'], ['/site/index'], ['class' => 'btn btn-danger', 'data-toggle' => "tooltip", 'data-placement' => "top", 'title' => "Solicitar inscripción"]) ?>
    <?php
    // solo cuando es visitante, no registrado
    if (Yii::$app->user->isGuest) {
        echo Html::a(\Yii::$app->params['btnInscribirme'], ['site/login/'], ['class' => 'btn btn-success ']);

    } else {

        echo Html::a(\Yii::$app->params['btnInscribirme'], ['inscription/createown/', 'id' => $modelEvent->id], ['class' => 'btn btn-success  ']);

    }?>

    <!--  <? /*= Html::a(\Yii::$app->params['btnInscriptionS1'], ['updateown', 'id' => $model->id], ['class' => 'btn btn btn-primary']) */ ?>
    <? /*= Html::a(\Yii::$app->params['btnInscriptionS2'], ['eventanswer', 'id' => $model->id], ['class' => 'btn btn btn-success']) */ ?>
    --><? /*= Html::a(\Yii::$app->params['btnInscriptionS3'], ['answer', 'id' => $model->id], ['class' => 'btn btn btn-success']) */ ?>
    <? /*= Html::a(\Yii::$app->params['btnNuevaInquietud'], ['request/createown', 'inscription_id' => $model->id], ['class' => 'btn btn-info']) */ ?>
    <!-- AYUDA-->


  <!--  --><?php
/*    Modal::begin([
        'header' => '<h4>Eventos ASOCAM</h4>',
        'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
    ]);

    echo $this->render('/help/event-index');
    Modal::end();
    */?>


</div>
<div class="container-fluid">
    <div class="row">

        <!--Visualización información del evento-->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-primary">
                <?= $this->render('/event/_detailinfo', ['model' => $modelEvent]) ?>
            </div>
            <!--END Gestión de Proyectos-->
            <?php if ($modelEvent->cost>0){ ?>
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i style="font-size:2em;" class="glyphicon glyphicon-usd"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $modelEvent->cost ?> USD</div>
                            Costo del evento
                        </div>
                    </div>
                </div>

                <?php if ($modelEvent->discount): ?>


                    <div class="panel-body">
                        <div role="tabpanel">
                            <strong>Costo: </strong>$<?= Html::encode($modelEvent->cost) ?><br>
                            <strong>Información: </strong><?= Html::encode($modelEvent->discount_description) ?><br>
                            <strong>Fin de descuento: </strong><?= Html::encode($modelEvent->discount_end_at) ?>


                        </div>

                    </div>
                <?php endif; ?>

            </div>
            <?php } ?>

            <?php if ( ($modelEvent->cost==0)&&($modelEvent->discount) ){ ?>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div role="tabpanel">

                        <strong>Información: </strong><?= Html::encode($modelEvent->discount_description) ?>



                    </div>

                </div>
            </div>
            <?php } ?>

        </div>
        <!--END Visualización evento-->


        <!--Gestión de Proyectos-->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><?= Html::encode($this->title) ?></div>
                <div class="panel-body">
                    <?php if ($modelEvent->general_content): ?>
                    <blockquote>
                        <h4>Contenido General</h4>
                        <span style="font-size: 10pt; color: #808080;"> <?= $modelEvent->general_content; ?> </span>
                    </blockquote>
                    <?php endif; ?>
                    <?php if ($modelEvent->methodology): ?>
                    <blockquote>
                        <h4>Metodología</h4>
                         <span style="font-size: 10pt; color: #808080;"> <?= $modelEvent->methodology; ?></span>
                    </blockquote>
                    <?php endif; ?>
                    <?php if ($modelEvent->requirements ): ?>
                    <blockquote>
                        <h4>Requisitos</h4>
                         <span style="font-size: 10pt; color: #808080;"> <?= $modelEvent->requirements; ?></span>
                    </blockquote>
                    <?php endif; ?>
                    <?php if ($modelEvent->addressed_to ): ?>
                    <blockquote>
                        <h4>Dirigido a</h4>
                         <span style="font-size: 10pt; color: #808080;"> <?= $modelEvent->addressed_to; ?> </span>
                    </blockquote>
                    <?php endif; ?>
                    <?php if ($modelEvent->included ): ?>
                    <blockquote>
                        <h4>El evento incluye</h4>
                        <span style="font-size: 10pt; color: #808080;"> <?= $modelEvent->included; ?></span>
                    </blockquote>
                    <?php endif; ?>


                </div>
            </div>
        </div>


        <!--END Gestión de Proyectos-->

    </div>
</div>
</div>
