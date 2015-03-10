<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 <!--Pais-->
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-primary"> 
                <div class="panel-heading">
                        <!--<div class="media">
                        <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="..." alt="..."
                              <img class="img-responsive" src="imgs/flags/gt.png" alt="">                              >
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Guatemala                        </div>
                    </div>-->
                    Guatemala                </div>
                <img class="img-responsive figure" src="imgs/event/cursos-2015.jpg" alt="">            <div class="panel-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <center> <img class="img-responsive" src="imgs/flags/gt.png" alt=""></center>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <center><strong>Ciudad: </strong>Antigua Guatemala, Guatemala<br></center>
                </div>
            </div>
                <div class="panel-body">

                    <strong>Inicia: </strong>7 de septiembre de 2015<br>
                    <strong>Finaliza: </strong>11 de septiembre de 2015<br>
                    <hr>
                    <strong>Incluye: </strong><p>Alimentación durante el evento. - Refrigerios. - Materiales de capacitación.</p>
                    <strong>Estado del curso: </strong>10<br>
                </div>
            </div>
</div>
<!--END Pais-->
<!--Contenido-->
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
<div class="panel panel-primary">
  <div class="panel-heading">Medición de Cadenas de Resultados con el Estándar CDDE</div>
    <br>
    <div class="event-view">

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Evento',
//                'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialEvent',['model'=>$model]),
                'active' => true
            ],
            [
                'label' => 'Preguntas del Evento',
//                  'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialEventquestion',['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel,'eventtype_id'=>$model->eventtype_id,'event_id'=>$model->id]),
//                 'options' => ['id' => 'myveryownID'],
            ],
        ],
    ]) ?>

</div>

</div>
</div>

<!--END Contenido-->
