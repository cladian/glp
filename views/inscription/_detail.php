<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Logistic */


// Modelo retornado $model = Logistica


?>
<!--<div class="panel-heading"><h5>Logistica</h5></div>-->
<hr>

<div class="col-sm-4 col-xs-12 col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading"><h5>Llegada al lugar del evento</h5></div>
        <div class="panel-body">
            <address>
                <strong><?= $model->leavingonorigincity ?></strong><br>
                <strong>Inicia: </strong><?= $model->leavingonairline; ?><br>
                <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($model->leavingondate, 'long'); ?><br>

            </address>
        </div>
    </div>
</div>
</div>
<div class="col-sm-4 col-xs-12 col-lg-4">
    <div class="panel panel-info">
        <div class="panel-heading"><h5>Retorno al Lugar de Origen</h5></div>
        <div class="panel-body">
            <address>
                <strong><?= $model->leavingonorigincity ?></strong><br>
                <strong>Inicia: </strong><?= $model->leavingonairline; ?><br>

            </address>
        </div>
    </div>
</div>
</div>
<div class="col-sm-4 col-xs-12 col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading"><h5>Alojamiento en el lugar del evento</h5></div>
        <div class="panel-body">
            <address>
                <strong><?= $model->leavingonorigincity ?></strong><br>
                <strong>Inicia: </strong><?= $model->leavingonairline; ?><br>

            </address>
        </div>
    </div>
</div>
</div>

<div class=" col-xs-12">
<div class=" col-xs-6">
    <div class="panel-heading"><h5>Preguntas por evento</h5></div>
    <div class="progress">

        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
             style="width: 60%;">
            60%
        </div>
    </div>
</div>
<div class=" col-xs-6">
    <div class="panel-heading "><h5>Preguntas generales</h5></div>
    <div class="progress">

        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
             style="width: 60%;">
            60%
        </div>
    </div>
</div>

    </div>
<?php

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
}?>

</div>
<div class=" col-xs-12">
    <div class="panel-heading"><h5>Preguntas por evento</h5></div>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
             style="width: 60%;">
            60%
        </div>
    </div>
</div>
