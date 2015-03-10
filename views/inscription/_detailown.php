<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Logistic */


// Modelo retornado $model = Logistica


?>
    <?= Html::a('ver', ['inscription/view', 'id' => $modelLogistic->inscription_id], ['class' => 'btn btn-primary']) ?>
<hr>

<div class="col-sm-6 col-xs-12 col-lg-6">
    <div class="panel panel-success">
        <div class="panel-heading"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
            Llegada al lugar del evento</div>
        <div class="panel-body">
            <address>
                <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                <strong>Ciudad de procedencia: </strong><?= $modelLogistic->leavingonorigincity; ?><br>
                <strong> Aerolinea de llegada: </strong><?= $modelLogistic->leavingonairline; ?><br>
                <strong># Vuelo llegada: </strong><?= $modelLogistic->leavingonflightnumber; ?><br>
                <strong>Fecha de arribo:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->leavingondate, 'long'); ?><br>
                <strong>Hora de arribo: </strong><?= $modelLogistic->leavingonhour; ?><br>


            </address>
        </div>
    </div>
</div>
</div>
<div class="col-sm-6 col-xs-12 col-lg-6">
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
            Retorno al Lugar de Origen</div>
        <div class="panel-body">
            <address>
                <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                <strong>Fecha de retorno: </strong><?= $modelLogistic->returningonairline; ?><br>
                <strong># Vuelo retorno: </strong><?= $modelLogistic->returningonflightnumber; ?><br>
                <!--                <strong>Fecha de retorno: </strong>--><? //= $model->returningondate; ?><!--<br>-->
                <strong>Fecha de
                    retorno:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->returningondate, 'long'); ?><br>
                <strong>Hora de retorno: </strong><?= $modelLogistic->returningonhour; ?><br>

            </address>
        </div>
    </div>
</div>
</div>

<div class=" col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            Alojamiento en el lugar del evento</div>
        <div class="panel-body">
            <address>
                <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                <!--                <strong>Fecha de Entrada: </strong>-->
                <? //= $model->accommodationdatein; ?><!--<br>-->
                <strong>Fecha de Entrada:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->accommodationdatein, 'long'); ?><br>
                <!--                <strong>Fecha de Salida: </strong>-->
                <? //= $model->accommodationdateout; ?><!--<br>-->
                <strong>Fecha de Salida:: </strong><?= Yii::$app->formatter->asDate($modelLogistic->accommodationdateout, 'long'); ?><br>

            </address>
        </div>
    </div>
</div>
</div>

<div class=" col-xs-12">
    <div class=" col-xs-6">
        <div class="panel-heading "><h5>Preguntas por evento</h5></div>
        <div class="progress">

            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$model->complete_eventquiz;?>" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?=$model-> complete_eventquiz;?>%;">
                <?=$model->complete_eventquiz;?>%
            </div>
        </div>
    </div>
    <div class=" col-xs-6">
        <div class="panel-heading"><h5>Preguntas generales</h5></div>
        <div class="progress">

            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$model->complete_quiz;?>" aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: <?=$model->complete_quiz;?>%;">
               <?=$model->complete_quiz;?>%
            </div>
        </div>
    </div>


</div>
<?php
/*
if ($model->residence) {
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'residence',
            'residenceobs:ntext',
            'accommodationdatein',
            'accommodationdateout',
            'status',
            'created_at',
//            'updated_at',
        ],
    ]);

} else {
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'leavingonorigincity',
            'leavingonairline',
            'leavingonflightnumber',
            'leavingondate',
            'leavingonhour',
            'returningonairline',
            'returningonflightnumber',
            'returningondate',
            'returningonhour',
            'accommodationdatein',
            'accommodationdateout',
            'status',
//            'created_at',
//            'updated_at',
        ],
    ]);
}*/?>

</div>
<!--<div class=" col-xs-12">
    <div class="panel-heading"><h5>Preguntas por evento</h5></div>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
             style="width: 60%;">
            60%
        </div>
    </div>
</div>
-->