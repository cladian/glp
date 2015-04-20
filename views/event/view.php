<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;

?>
<div class="breadcrumb">

    <?= Html::a(\Yii::$app->params['btnRegresar'], ['/site/index'], ['class' => 'btn btn-default']) ?>

    <?= Html::a(\Yii::$app->params['btnActualizar'], ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
  <!--  --><?/*= Html::a(\Yii::$app->params['btnEliminar'], ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) */?>
    <?= Html::a(\Yii::$app->params['btnSubirImagen'], ['resources', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    <?= Html::a(\Yii::$app->params['btnSubirDoc'], ['file', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    <?= Html::a(\Yii::$app->params['btnPregunta'], ['eventquestion/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    <?= Html::a(\Yii::$app->params['btnEstadisticas'], ['event/statistics', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

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
<!--Pais-->
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

    <div class="panel panel-primary">
        <?= $this->render('/event/_detailinfo', ['model' => $model]) ?>
        <!-- <div class="panel-footer">
            <?= Html::a(\Yii::$app->params['btnRegresar'], ['index'], ['class' => 'btn btn-success']) ?>

        </div> -->
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i style="font-size:2em;" class="glyphicon glyphicon-usd"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?= $model->cost ?> USD</div>
                    Costo del evento
                </div>
            </div>
        </div>
        <?php if ($model->discount): ?>


            <div class="panel-body">
                <div role="tabpanel">
                    <strong>Costo: </strong>$<?= Html::encode($model->cost) ?><br>
                    <strong>Información: </strong><?= Html::encode($model->discount_description) ?><br>
                    <strong>Fin de descuento: </strong><?= Html::encode($model->discount_end_at) ?>


                </div>

            </div>
        <?php endif; ?>

    </div>
    <div class="panel panel-primary">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                   aria-expanded="false" aria-controls="collapseThree">
                    Recursos
                </a>
            </h4>
        </div>

        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'file:ntext',
//                    'photo:ntext',
                    'url:ntext',
                ],
            ]) ?>
        </div>

    </div>


</div>
<!--END Pais-->
<!--Contenido-->
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="panel panel-primary">
        <div class="panel-heading"><?= Html::encode($this->title) ?></div>
        <div class="panel-body">
            <blockquote>
                <h4>Contenido General</h4>
                <span style="font-size: 10pt; color: #808080;"> <?= $model->general_content; ?> </span>
            </blockquote>
            <blockquote>
                <h4>Metodología</h4>
                <span style="font-size: 10pt; color: #808080;"> <?= $model->methodology; ?></span>
            </blockquote>
            <blockquote>
                <h4>Requisitos</h4>
                <span style="font-size: 10pt; color: #808080;"> <?= $model->requirements; ?></span>
            </blockquote>
            <blockquote>
                <h4>Dirigido a</h4>
                <span style="font-size: 10pt; color: #808080;"> <?= $model->addressed_to; ?> </span>
            </blockquote>
            <blockquote>
                <h4>El evento incluye</h4>
                <span style="font-size: 10pt; color: #808080;"> <?= $model->included; ?></span>
            </blockquote>


        </div>
    </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="heading4">
                <h4 class="panel-title">

                    Preguntas por evento

                </h4>
            </div>

            <div class="panel-body">
                <?= $this->render('_partialEventquestion', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel, 'eventtype_id' => $model->eventtype_id, 'event_id' => $model->id]) ?>
                <?= Html::a(\Yii::$app->params['btnPregunta'], ['eventquestion/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            </div>

        </div>

    </div>

</div>

<!--END Contenido-->
