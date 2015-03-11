<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

if ($model->residence) {
    ?>
    <div class=" col-xs-12">
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Residencia en la ciudad del evento
            </div>
            <div class="panel-body">
                <address>

                    <strong>Reside en la ciudad del evento: </strong><?= ($model->residence ? ('SI') : ('NO')); ?>
                    <br>
                    <!--                <strong>Fecha de Salida: </strong>-->
                    <? //= $model->accommodationdateout; ?><!--<br>-->
                    <strong>Fecha de
                        Salida:: </strong><?= $model->residenceobs; ?>
                </address>
            </div>
        </div>
        <br>
    </div>
<?php } else { ?>
    <div class="col-sm-6 col-xs-12 col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                Llegada al lugar del evento
            </div>
            <div class="panel-body">
                <address>
                    <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                    <strong>Ciudad de procedencia: </strong><?= $model->leavingonorigincity; ?><br>
                    <strong> Aerolinea de llegada: </strong><?= $model->leavingonairline; ?><br>
                    <strong># Vuelo llegada: </strong><?= $model->leavingonflightnumber; ?><br>
                    <strong>Fecha de
                        arribo:: </strong><?= Yii::$app->formatter->asDate($model->leavingondate, 'long'); ?><br>
                    <strong>Hora de arribo: </strong><?= $model->leavingonhour; ?>


                </address>
            </div>
        </div>
        <br>
    </div>

    <div class="col-sm-6 col-xs-12 col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                Retorno al Lugar de Origen
            </div>
            <div class="panel-body">
                <address>
                    <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                    <strong>Fecha de retorno: </strong><?= $model->returningonairline; ?><br>
                    <strong># Vuelo retorno: </strong><?= $model->returningonflightnumber; ?><br>
                    <!--                <strong>Fecha de retorno: </strong>-->
                    <? //= $model->returningondate; ?><!--<br>-->
                    <strong>Fecha de
                        retorno:: </strong><?= Yii::$app->formatter->asDate($model->returningondate, 'long'); ?><br>
                    <strong>Hora de retorno: </strong><?= $model->returningonhour; ?>


                </address>
            </div>
        </div>
        <br>
    </div>
<?php } ?>



<div class=" col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            Alojamiento en el lugar del evento
        </div>
        <div class="panel-body">
            <address>

                <strong>Fecha de
                    Entrada:: </strong><?= Yii::$app->formatter->asDate($model->accommodationdatein, 'long'); ?>
                <br>
                <!--                <strong>Fecha de Salida: </strong>-->
                <? //= $model->accommodationdateout; ?><!--<br>-->
                <strong>Fecha de
                    Salida:: </strong><?= Yii::$app->formatter->asDate($model->accommodationdateout, 'long'); ?>
                <br>

            </address>
        </div>
    </div>

</div>
