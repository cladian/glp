<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Inscription */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button class="btn btn-primary" type="button"> Inscripción <span class="badge"><?= $model->complete;  ?>%</span></button>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-info" type="button"> Logistica <span class="badge"><?= $model->complete_logistic; ?>%</span></button>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-info" type="button"> Encuesta evento <span class="badge"><?= $model->complete_eventquiz; ?>%</span></button>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-info" type="button"> Encuesta General <span class="badge"><?= $model->complete_quiz; ?>%</span></button>
        </div>

    </div>
<hr>
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
<!--Registro-->

<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

    


<div class="panel panel-primary">
  <div class="panel-heading">Registro de Inscripción</div>
  
  
<br>


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

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Inscripción',
                //'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialInscription',['model'=>$model]),
                'active' => true
            ],
            [
                'label' => 'Logistica',
              //  'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialLogistic',['model'=>$modelLogistic]),
              //  'options' => ['id' => 'myveryownID'],
        ],

         [
            'label' => 'Encuestas',
            'items' => [

                [
                    'label' => 'Respuestas del Evento',
                    //'content' => 'DropdownB, Anim pariatur cliche...',
                    'content' => $this->render('_partialEventanswer',['searchModel'=>$searchModelEventanswer, 'dataProvider'=>$dataProviderEventanswer]),
                ],
                [
                    'label' => 'Respuestas',
//                    'content' => 'DropdownB, Anim pariatur cliche...',
                    'content' => $this->render('_partialAnswer',['searchModel'=>$searchModelAnswer, 'dataProvider'=>$dataProviderAnswer]),
                ],
            ],
        ],
            [
                'label' => 'Solicitudes',
//                  'content' => 'Anim pariatur cliche...',
                'content' => $this->render('_partialRequest',['searchModel'=>$searchModelRequest, 'dataProvider'=>$dataProviderRequest]),
                //  'options' => ['id' => 'myveryownID'],
            ],
    ],
]);  ?>
</div>
</div>

<!--ENDRegistro-->
