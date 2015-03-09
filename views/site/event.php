<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $modelEvent->name;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <!--Gestión de Proyectos-->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="panel panel-primary"> 
              <div class="panel-heading"><center><h5><?= Html::encode($this->title) ?></h5></center></div>
              <div class="panel-body">
                <strong>Descripción: </strong>
                <p><?= Html::encode($modelEvent->short_description) ?></p>
              </div>
              <div class="panel-body">  
                <p><?= Html::encode($modelEvent->general_content) ?></p>
              </div>
              <div class="panel-body">
                <p><?= Html::encode($modelEvent->methodology) ?></p>
              </div>
              <div class="panel-body">
                  <strong>Archivo PDF: </strong><?= Html::encode($modelEvent->file) ?><br>
                  <strong>Descuento: </strong><?= Html::encode($modelEvent->discount) ?><br>
                  <strong>Fin de descuento: </strong><?= Html::encode($modelEvent->discount_end_at) ?><br>
                  <strong>Descripción de descuento: </strong><?= Html::encode($modelEvent->discount_description) ?><br>
                  
              </div>
            </div>
        </div>
        <!--END Gestión de Proyectos-->
        <!--Pais-->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-primary"> 
                <div class="panel-heading">
                        <!--<div class="media">
                        <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="..." alt="..."
                              <?= Html::img('imgs/flags/'.strtolower($modelEvent->country->iso).'.png',['class'=>'img-responsive']);?>
                              >
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><?= Html::encode($modelEvent->country->name) ?></h5>
                        </div>
                    </div>-->
                    <center><h5><?= Html::encode($modelEvent->country->name) ?></h5></center>
                </div>
                <center><?= Html::img('imgs/event/cursos-2015.jpg',['class'=>'img-responsive figure']);?></center>
            <div class="panel-body">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <center><?= Html::img('imgs/flags/'.strtolower($modelEvent->country->iso).'.png',['class'=>'img-responsive']);?></center>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <center><strong>Ciudad: </strong><?= Html::encode($modelEvent->city) ?><br></center>
                </div>
            </div>
                <div class="panel-body">
                    <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($modelEvent->begin_at, 'long'); ?><br>
                    <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($modelEvent->end_at, 'long'); ?><br><br>
                    <strong>Descripción: </strong><?= Html::encode($modelEvent->short_description) ?><br>
                </div>
                <div class="panel-body">
                  <strong>Estatus: </strong><?= Html::encode($modelEvent->status) ?><br>
                  <strong>Costo: </strong>$<?= Html::encode($modelEvent->cost) ?><br>
                  
                </div>
            </div>
        </div>
        <!--END Pais-->
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
            <?= Html::a('Regresar', ['/site/admuser'], ['class' => 'btn btn-success']) ?><?= Html::a('Registrarme', ['site/signup/'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
            <?= Html::a('Registrarme', ['site/signup/'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
<!--<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p></p>
    <p><?= Html::encode($modelEvent->short_description) ?></p>
    <p><?= Html::encode($modelEvent->general_content) ?></p>
    <p><?= Html::encode($modelEvent->methodology) ?></p>
    <p><?= Html::encode($modelEvent->addressed_to) ?></p>
    <p><?= Html::encode($modelEvent->included) ?></p>
    <p><?= Html::encode($modelEvent->requirements) ?></p>
    <p><?= Html::encode($modelEvent->file) ?></p>
    <p><?= Html::encode($modelEvent->photo) ?></p>
    <p><?= Html::encode($modelEvent->url) ?></p>
    <strong>Inicia: </strong><?= Yii::$app->formatter->asDate($modelEvent->begin_at, 'long'); ?><br>
    <strong>Finaliza: </strong><?= Yii::$app->formatter->asDate($modelEvent->end_at, 'long'); ?><br>
    <p><?= Html::encode($modelEvent->city) ?></p>
    <p><?= Html::encode($modelEvent->cost) ?></p>
    <p><?= Html::encode($modelEvent->discount) ?></p>
    <p><?= Html::encode($modelEvent->discount_end_at) ?></p>
    <p><?= Html::encode($modelEvent->discount_description) ?></p>
    <p><?= Html::encode($modelEvent->year) ?></p>
    <p><?= Html::encode($modelEvent->status) ?></p>
    <p><?= Html::encode($modelEvent->created_at) ?></p>
    <p><?= Html::encode($modelEvent->updated_at) ?></p>
    <p><?= Html::encode($modelEvent->country->name) ?></p>
-->
    <!-- botón-->
    

<!--
    <p>
        <?/*= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
        <?/*= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    --><?/*= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'short_description:ntext',
            'general_content:ntext',
            'methodology:ntext',
            'addressed_to:ntext',
            'included:ntext',
            'requirements:ntext',
            'file:ntext',
            'photo:ntext',
            'url:ntext',
            'begin_at',
            'end_at',
            'city',
            'cost',
            'discount',
            'discount_end_at',
            'discount_description',
            'year',
            'status',
            'created_at',
            'updated_at',
//            'country_id',
            [                    // the owner name of the model
                'label' => 'Pais',
                'value' => $model->country->name,
            ],
//            'eventtype_id',
            [                    // the owner name of the model
                'label' => 'Tipo de Evento',
                'value' => $model->eventtype->name,
            ],
        ],
    ]) */?>

</div>
