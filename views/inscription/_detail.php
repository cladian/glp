<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Logistic */


// Modelo retornado $model = Logistica


?>
<!--<div class="panel-heading"><h5>Logistica</h5></div>-->
<?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Visualizar', ['view', 'id' => $modelLogistic->inscription_id], ['class' => 'btn btn btn-success']) ?>
<hr>
<?php if ($modelLogistic->residence) { ?>
    <div class="col-sm-4 col-xs-12 col-lg-4">
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Residencia en la ciudad del evento
            </div>
            <div class="panel-body">
                <address>
                    <strong>Reside en la ciudad del
                        evento </strong><?= ($modelLogistic->residence ? ('SI') : ('NO')); ?><br>
                    <strong>Observación: </strong><?= $modelLogistic->residenceobs; ?><br>
                </address>
            </div>
        </div>
        <br>
    </div>

    <div class="col-sm-4 col-xs-12 col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                Alojamiento en el lugar del evento
            </div>
            <div class="panel-body">
                <address>
                    <strong>Fecha de
                        Entrada:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->accommodationdatein, 'long'); ?>
                    <br>
                    <strong>Fecha de
                        Salida:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->accommodationdateout, 'long'); ?>
                    <br>
                </address>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-xs-12 col-lg-4">
        <div class="panel panel-success">
            <div class="panel-heading">Perfil de Participante</div>
            <div class="panel-body">
                <?php if ($modelProfile) { ?>
                    <?= Html::img($modelProfile->getImageUrl(), ['class' => 'img-responsive img-thumbnail']); ?>
                    <address>
                        <strong><?= $modelProfile->name . ' ' . $modelProfile->lastname;; ?></strong><br>
                        <strong>phone: </strong><?= $modelProfile->phone_number; ?> <br>
                        <strong>mail: </strong><?= $modelLogistic->inscription->user->email; ?> <br>
                        <?= Html::img('imgs/flags/24/' . strtolower($modelProfile->country->iso) . '.png'); ?>
                    </address>
                <?php } else { ?>
                    <?= Html::img(Yii::$app->params['avatarFolder'] . 'profile.png', ['class' => 'img-responsive img-thumbnail']); ?>
                    <address>
                        <strong>Perfil: </strong>Información pendiente
                    </address>
                <?php }?>
            </div>
        </div>
    </div>



<?php } else { ?>


    <div class="col-sm-4 col-xs-12 col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Llegada al lugar del evento</div>
            <div class="panel-body">
                <address>
                    <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                    <strong>Ciudad de procedencia: </strong><?= $modelLogistic->leavingonorigincity; ?><br>
                    <strong> Aerolinea de llegada: </strong><?= $modelLogistic->leavingonairline; ?><br>
                    <strong># Vuelo llegada: </strong><?= $modelLogistic->leavingonflightnumber; ?><br>
                    <!--                <strong>Fecha de arribo: </strong>--><? //= $model->leavingondate; ?><!--<br>-->
                    <strong>Hora de arribo: </strong><?= $modelLogistic->leavingonhour; ?><br>
                    <strong>Fecha de
                        arribo:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->leavingondate, 'long'); ?>
                    <br>

                </address>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-xs-12 col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">Retorno al Lugar de Origen</div>
            <div class="panel-body">
                <address>
                    <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                    <strong>Fecha de retorno: </strong><?= $modelLogistic->returningonairline; ?><br>
                    <strong># Vuelo retorno: </strong><?= $modelLogistic->returningonflightnumber; ?><br>
                    <!--                <strong>Fecha de retorno: </strong>-->
                    <? //= $model->returningondate; ?><!--<br>-->
                    <strong>Fecha de
                        retorno:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->returningondate, 'long'); ?>
                    <br>
                    <strong>Hora de retorno: </strong><?= $modelLogistic->returningonhour; ?><br>

                </address>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-xs-12 col-lg-4">
        <div class="panel panel-success">
            <div class="panel-heading">Perfil</div>
            <div class="panel-body">
                <?php if ($modelProfile) { ?>
                    <?= Html::img($modelProfile->getImageUrl(), ['class' => 'img-responsive img-thumbnail']); ?>
                    <address>
                        <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                        <strong><?= $modelProfile->name . ' ' . $modelProfile->lastname;; ?></strong><br>
                        <strong>phone: </strong><?= $modelProfile->phone_number; ?> <br>
                        <strong>mail: </strong><?= $modelLogistic->inscription->user->email; ?> <br>
                        <?= Html::img('imgs/flags/24/' . strtolower($modelProfile->country->iso) . '.png'); ?>
                    </address>
                <?php } else { ?>
                    <?= Html::img(Yii::$app->params['avatarFolder'] . 'profile.png', ['class' => 'img-responsive img-thumbnail']); ?>
                    <address>
                        <strong>Perfil: </strong>Información pendiente
                    </address>
                <?php

                }?>
            </div>
        </div>
    </div>
    <div class=" col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Alojamiento en el lugar del evento</div>
            <div class="panel-body">
                <address>
                    <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                    <!--                <strong>Fecha de Entrada: </strong>-->
                    <? //= $model->accommodationdatein; ?><!--<br>-->
                    <strong>Fecha de
                        Entrada:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->accommodationdatein, 'long'); ?>
                    <br>
                    <!--                <strong>Fecha de Salida: </strong>-->
                    <? //= $model->accommodationdateout; ?><!--<br>-->
                    <strong>Fecha de
                        Salida:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->accommodationdateout, 'long'); ?>
                    <br>

                </address>
            </div>
        </div>
    </div>
<?php } ?>



<div class=" col-xs-12">
    <div class=" col-xs-6">
        <div class="panel-heading"><h5>Preguntas por evento</h5></div>
        <div class="progress">

            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: 60%;">
                60%
            </div>
        </div>
    </div>
    <div class=" col-xs-6">
        <div class="panel-heading "><h5>Preguntas generales</h5></div>
        <div class="progress">

            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: 60%;">
                60%
            </div>
        </div>
    </div>

</div>