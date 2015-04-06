<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $modelEvent->name;

?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])?>
</div>
<div class="container-fluid">
    <div class="row">

        <!--Visualización información del evento-->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-primary">
                <?= $this->render('/event/_detailinfo', ['model' => $modelEvent])?>
                <div class="panel-footer">
                    
                    <?/*= Html::a(\Yii::$app->params['btnInscribirme'], ['site/signup/'], ['class' => 'btn btn-success'])*/?>


   <?php
                    // solo cuando es visitante, no registrado
                    if (Yii::$app->user->isGuest) {
                        echo Html::a(\Yii::$app->params['btnInscribirme'], ['site/login/'], ['class' => 'btn btn-success ']);

                    } else {

                        echo Html::a(\Yii::$app->params['btnInscribirme'], ['inscription/createown/', 'id' => $modelEvent->id], ['class' => 'btn btn-success  ']);

                    }?>



                </div>
            </div>
        </div>
        <!--END Visualización evento-->


        <!--Gestión de Proyectos-->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="panel panel-primary"> 
              <div class="panel-heading"><?= Html::encode($this->title) ?></div>
              <div class="panel-body">
                <div role="tabpanel">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></span>   Descripción</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-tags"></span>   Metodología del curso</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-file"></span>   Documentos Adicionales</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home"><p>
                        <h3>Contenido General: </h3><?= Html::encode($modelEvent->general_content) ?></p>
                        
                       
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <h3>Metodología: </h3><p><?= Html::encode($modelEvent->methodology) ?></p> 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="settings">
                          <h3>Archivo PDF: </h3><?= Html::encode($modelEvent->file) ?><br>
                          <hr><h3>Requerimientos: </h3><?= Html::encode($modelEvent->requirements) ?>

                    </div>
                  </div>

                </div>
              </div>
            </div>
        </div>

        <!--END Gestión de Proyectos-->
        <!--Gestión de Proyectos-->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="panel panel-primary"> 
              <div class="panel-heading">Descuento</div>
              <div class="panel-body">
                <div role="tabpanel">
                    <strong>Costo: </strong>$<?= Html::encode($modelEvent->cost) ?><br>
                    <strong>Descuento: </strong><?= Html::encode($modelEvent->discount) ?><br>
                    <strong>Fin de descuento: </strong><?= Html::encode($modelEvent->discount_end_at) ?>

                  

                </div>
              </div>
            </div>
        </div>
        

        <!--END Gestión de Proyectos-->
        
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
