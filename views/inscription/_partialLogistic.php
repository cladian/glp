<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Logistic */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'logística', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logistic-view">

    <!--<h2>Registro de Logistica </h2>-->
<br>
<div class="col-sm-6 col-xs-12 col-lg-6">
    <div class="panel panel-success">
        <div class="panel-heading"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
            Llegada al lugar del evento</div>
        <div class="panel-body">
            <address>
                <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
                <strong>Ciudad de procedencia: </strong><?= $model->leavingonorigincity; ?><br>
                <strong> Aerolinea de llegada: </strong><?= $model->leavingonairline; ?><br>
                <strong># Vuelo llegada: </strong><?= $model->leavingonflightnumber; ?><br>
                <strong>Fecha de arribo:: </strong><?= Yii::$app->formatter->asDate($model->leavingondate, 'long'); ?><br>
                <strong>Hora de arribo: </strong><?= $model->leavingonhour; ?><br>


            </address>
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
                <strong>Fecha de retorno: </strong><?= $model->returningonairline; ?><br>
                <strong># Vuelo retorno: </strong><?= $model->returningonflightnumber; ?><br>
                <!--                <strong>Fecha de retorno: </strong>--><? //= $model->returningondate; ?><!--<br>-->
                <strong>Fecha de
                    retorno:: </strong><?= Yii::$app->formatter->asDate($model->returningondate, 'long'); ?><br>
                <strong>Hora de retorno: </strong><?= $model->returningonhour; ?><br>

            </address>
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
                <strong>Fecha de Entrada:: </strong><?= Yii::$app->formatter->asDate($model->accommodationdatein, 'long'); ?><br>
                <!--                <strong>Fecha de Salida: </strong>-->
                <? //= $model->accommodationdateout; ?><!--<br>-->
                <strong>Fecha de Salida:: </strong><?= Yii::$app->formatter->asDate($model->accommodationdateout, 'long'); ?><br>

            </address>
        </div>
    </div>
</div>




    <!--<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'inscription_id',
            'leavingonorigincity',
            'leavingonairline',
            'leavingonflightnumber',
            'leavingondate',
            'leavingonhour',
            'returningonairline',
            'returningonflightnumber',
            'returningondate',
            'returningonhour',
            'residence',
            'residenceobs:ntext',
            'accommodationdatein',
            'accommodationdateout',
            'status',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>-->
<div class="panel-body">
    <p>
        <?= Html::a('Actualizar', ['logistic/updateown', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?/*= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>
</div>
</div>
